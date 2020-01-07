<?php
declare(strict_types=1);

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
use LMS\Facade\Repository\CRUD as ProvidesCRUDActions;
use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;
use LMS\Facade\{Extbase\QueryBuilder, Extbase\TypoScriptConfiguration, Extbase\ExtensionHelper};

/**
 * @psalm-suppress PropertyNotSetInConstructor
 * @author         Borulko Sergey <borulkosergey@icloud.com>
 */
abstract class AbstractRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    use ProvidesCRUDActions, StaticCreation, ExtensionHelper, Collectionable;

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
     * @return string
     */
    protected function getExtensionKey(): string
    {
        return self::extensionTypoScriptKey();
    }

    /**
     * Returns an array with initialized properties for requested record
     *
     * @psalm-suppress PossiblyInvalidMethodCall
     *
     * @param int $uid
     * @param string $table
     *
     * @return array
     */
    protected function findRaw(int $uid, string $table): array
    {
        $builder = QueryBuilder::getQueryBuilderFor($table)->select('*')->from($table);

        $where = $builder->expr()->eq('uid', $uid);

        return $this->toCollection(
            (array)$builder->where($where)->execute()->fetch()
        );
    }

    /**
     * @param int $uid
     * @param array $props
     *
     * @return \LMS\Facade\Assist\Collection
     */
    public function findById(int $uid, array $props = []): Collection
    {
        if (!$entity = $this->findByUid($uid)) {
            return collect();
        }

        return collect($this->callObjectGetters($entity))
            ->when((bool)$props, static function (Collection $collection) use ($props) {
                return $collection->only($props);
            });
    }

    /**
     * @param array $uidList
     * @param array $props
     *
     * @return \LMS\Facade\Assist\Collection
     */
    public function findByIds(array $uidList, array $props = []): Collection
    {
        $enteties = array_map(function (int $uid) use ($props) {
            return $this->findById($uid, $props);
        }, $uidList);

        return collect($enteties);
    }

    /**
     * @param array $props
     * @return \LMS\Facade\Assist\Collection
     */
    public function all(array $props = []): Collection
    {
        return $this->toCollection($this->findAll()->toArray(), $props);
    }
}
