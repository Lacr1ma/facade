<?php
/** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types = 1);

namespace LMS\Facade\Repository;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

use LMS\Facade\Assist\Collection;
use TYPO3\CMS\Core\Database\Connection;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 * @author         Borulko Sergey <borulkosergey@icloud.com>
 */
class PageRepository extends \TYPO3\CMS\Core\Domain\Repository\PageRepository
{
    private Connection $connection;

    public function __construct()
    {
        parent::__construct();

        $this->connection = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getConnectionForTable('pages');
    }

    public function findSubPagesGroupedByPid(int $page, string $select = 'IF(sys_language_uid = 0, uid, l10n_parent) uid, pid'): Collection
    {
        $lang = $GLOBALS['TSFE']->language->getLanguageId();
        $iso = $GLOBALS['TSFE']->language->getTwoLetterIsoCode();

        $dql = <<<DQL
            SELECT
                $select
            FROM
                (select * from pages) p,
                (select @pv := ?) i
            WHERE
                find_in_set(pid, @pv) AND
                length(@pv := concat(@pv, ',', IF(sys_language_uid = 0, uid, l10n_parent))) AND
                nav_hide = 0 AND
                hidden = 0 AND
                deleted = 0 AND
                doktype IN (1, 3, 4, 190) AND
                sys_language_uid = ?
            ORDER BY
                pid, sorting
        DQL;

        $statement = $this->connection->executeQuery($dql, [$page, $lang]);

        $pages = collect($statement->fetchAllAssociative());

        if ($lang > 0) {
            $pages = $pages->map(static function (array $page) use ($iso) {
                $page['slug'] = $iso  . $page['slug'];

                return $page;
            });
        }

        return $pages->groupBy('pid');
    }

    public function findSubPagesGroupedByPidMySql8(int $page): array
    {
        $lang = $GLOBALS['TSFE']->language->getLanguageId();
        $iso = $GLOBALS['TSFE']->language->getTwoLetterIsoCode();

        $dql = <<<DQL
            WITH RECURSIVE cte
                (uid,pid,title,subtitle,sorting,nav_hide,deleted,hidden,doktype,sys_language_uid,slug,l10n_parent,url)
            as (
                SELECT
                    uid,
                    pid,
                    title,
                    subtitle,
                    sorting,
                    nav_hide,
                    deleted,
                    hidden,
                    doktype,
                    sys_language_uid,
                    slug,
                    l10n_parent,
                    url
                FROM
                    pages
                WHERE
                    pid = ?

                UNION ALL

                SELECT
                    p.uid,
                    p.pid,
                    p.title,
                    p.subtitle,
                    p.sorting,
                    p.nav_hide,
                    p.deleted,
                    p.hidden,
                    p.doktype,
                    p.sys_language_uid,
                    p.slug,
                    p.l10n_parent,
                    p.url
              FROM
                    pages p

              INNER JOIN cte ON IF(cte.sys_language_uid = 0, cte.uid, cte.l10n_parent) = p.pid
            )

            SELECT
                IF(sys_language_uid = 0, uid, l10n_parent) uid,
                pid,
                title,
                subtitle,
                coalesce(NULLIF(url, ""), slug) slug
            FROM
                cte
            WHERE
                nav_hide = 0 AND
                hidden = 0 AND
                deleted = 0 AND
                doktype IN (1, 3, 4, 190) AND
                sys_language_uid = ?
            ORDER BY
                pid, sorting
        DQL;
        $result = $this->connection->executeQuery($dql, [$page, $lang]);

        $pagesGroupedByPid = [];

        while (($row = $result->fetchAssociative()) !== false) {
            $record = $row;

            if ($lang > 0) {
                $record['slug'] .= $iso;
            }
            unset($record['pid']);

            $pagesGroupedByPid[$row['pid']][] = $record;
        }

        $pagesGroupedByPid = array_reverse($pagesGroupedByPid, true);
        $rootLevel = array_pop($pagesGroupedByPid);

        $data = [];
        foreach ($rootLevel as $p) {
            $row = $p;
            $row['children'] = $this->lookupChildrenForPageMysql8($p['uid'], $pagesGroupedByPid);

            $data[] = $row;
        }

        return $data;
    }

    public function queryBreadcrumb(): array
    {
        $lang = $GLOBALS['TSFE']->language->getLanguageId();
        $iso = $GLOBALS['TSFE']->language->getTwoLetterIsoCode();

        $dql = <<<DQL
            WITH RECURSIVE cte
                (uid, pid, title, slug, url, nav_hide, deleted, hidden, doktype, sys_language_uid, l10n_parent, level)
            as (
                SELECT
                    uid,
                    pid,
                    title,
                    slug,
                    url,
                    nav_hide,
                    deleted,
                    hidden,
                    doktype,
                    sys_language_uid,
                    l10n_parent,
                    1 level
                FROM
                    pages
                WHERE
                    uid = ?

                UNION ALL

                SELECT
                    p.uid,
                    p.pid,
                    p.title,
                    p.slug,
                    p.url,
                    p.nav_hide,
                    p.deleted,
                    p.hidden,
                    p.doktype,
                    p.sys_language_uid,
                    p.l10n_parent,
                    level + 1
              FROM
                    pages p

              INNER JOIN cte ON cte.pid = p.uid
            )

            SELECT
                IF(sys_language_uid = 0, uid, l10n_parent) uid,
                title,
                coalesce(NULLIF(url, ""), slug) slug
            FROM
                cte
            WHERE
                nav_hide = 0 AND
                hidden = 0 AND
                deleted = 0 AND
                doktype IN (1, 3, 4, 190) AND
                sys_language_uid = ?
            ORDER BY
                level DESC
        DQL;
        $result = $this->connection->executeQuery($dql, [$GLOBALS['TSFE']->id, $lang]);

        if ($lang === 0) {
            return $result->fetchAllAssociative();
        }

        $data = [];
        while (($row = $result->fetchAssociative()) !== false) {
            $record = $row;
            $record['slug'] .= $iso;

            $data[] = $record;
        }

        return $data;
    }

    private function lookupChildrenForPageMysql8(int $page, array $pages): array
    {
        if (!isset($pages[$page])) {
            return [];
        }

        if ($children = $pages[$page]) {
            $result = [];

            foreach ($children as $key => $child) {
                $result[$key] = $child;

                if ($child['uid'] !== $page) {
                    $result[$key]['children'] = $this->lookupChildrenForPageMysql8($child['uid'], $pages);
                }
            }

            return $result;
        }

        return [];
    }

    public function findSubPages(int $page): Collection
    {
        $collection = $this->findSubPagesGroupedByPid($page);

        $pages = $collection
            ->map(function (Collection $pidPages, int $pid) {
                $pages = $pidPages->pluck('uid')->toArray();

                return [$pid, ...$pages];
            });

        return $collection
            ->first()
            ->pluck('uid')
            ->map(function (int $uid) use ($pages) {
                return $this->lookupChildrenForPage($uid, $pages);
            })->flatten();
    }

    private function lookupChildrenForPage(int $page, Collection $pages)
    {
        if ($children = $pages->get($page)) {
            $result = [];

            foreach ($children as $child) {
                if ($child !== $page) {
                    $result[] = $this->lookupChildrenForPage($child, $pages);
                } else {
                    $result[] = $page;
                }
            }

            return $result;
        }

        return $page;
    }

    public function buildTree(int $startPage): Collection
    {
        $result = $this->getMenu($startPage, 'uid, title', 'sorting', 'nav_hide = 0');

        $menu = [];
        foreach ($result as $record) {
            $menu[$record['uid']] = $record;
            $menu[$record['uid']]['children'] = $this->buildTree($record['uid'])->toArray();
        }

        return Collection::make($menu)->values();
    }
}
