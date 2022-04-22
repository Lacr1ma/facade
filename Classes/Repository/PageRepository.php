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
