<?php
declare(strict_types = 1);

namespace LMS3\Support\Repository;

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

use Tightenco\Collect\Support\Collection;
use LMS3\Support\Repository\CRUD as ProvidesCRUDActions;
use LMS3\Support\{ObjectManageable, Extbase\QueryBuilder, Extbase\TypoScriptConfiguration};

/**
 * @author Borulko Sergey <borulkosergey@icloud.com>
 */
abstract class AbstractRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    use TypoScriptConfiguration, ProvidesCRUDActions, StaticCreation, ObjectManageable, QueryBuilder;

    /**
     * Sets the defined Storage PID that is set in the TypoScript area
     */
    public function initializeObject(): void
    {
        $settings = $this->createQuery()->getQuerySettings()->setStoragePageIds([
            TypoScriptConfiguration::getStoragePid($this->getExtensionKey())
        ]);

        $this->setDefaultQuerySettings($settings);
    }

    /**
     * Should return the extension key. Example: tx_support
     *
     * @return string
     */
    abstract protected function getExtensionKey(): string;

    /**
     * Returns an array with initialized properties for requested record
     *
     * @param int    $uid
     * @param string $table
     *
     * @return array
     */
    protected function findRaw(int $uid, string $table): array
    {
        $builder = self::getQueryBuilderFor($table);
        $where = $builder->expr()->eq('uid', $uid);

        return (array)$builder->select('*')->from($table)->where($where)->execute()->fetch();
    }

    /**
     * @param array $uidList
     *
     * @return \Tightenco\Collect\Support\Collection
     */
    public function findByIds(array $uidList): Collection
    {
        $entities = [];

        foreach ($uidList as $uid) {
            $entities[] = $this->findByUid((int)$uid);
        }

        return Collection::make($entities);
    }

    /**
     * @return \Tightenco\Collect\Support\Collection
     */
    public function all(): Collection
    {
        return Collection::make($this->findAll()->toArray());
    }
}
