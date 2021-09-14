<?php
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
use TYPO3\CMS\Extbase\Persistence\Repository;
use LMS\Facade\Repository\CRUD as ProvidesCRUDActions;
use LMS\Facade\{Extbase\TypoScriptConfiguration, Extbase\ExtensionHelper};

/**
 * @psalm-suppress PropertyNotSetInConstructor
 * @author         Borulko Sergey <borulkosergey@icloud.com>
 */
abstract class AbstractRepository extends Repository
{
    use ProvidesCRUDActions, PropertyManagement, StaticCreation, ExtensionHelper, Collectionable;

    public function initializeObject(): void
    {
        $settings = $this->createQuery()->getQuerySettings()->setStoragePageIds([
            $this->getPid()
        ]);

        $this->setDefaultQuerySettings($settings);
    }

    public function withoutPid(): self
    {
        $this->setDefaultQuerySettings(
            $this->createQuery()->getQuerySettings()->setRespectStoragePage(false)
        );

        return $this;
    }

    public function getPid(): int
    {
        return TypoScriptConfiguration::getStoragePid($this->getExtensionKey()) ?: 0;
    }

    protected function getExtensionKey(): string
    {
        return self::extensionTypoScriptKey();
    }

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

    public function findByIds(array $uidList, array $props = []): Collection
    {
        $enteties = array_map(function (int $uid) use ($props) {
            return $this->findById($uid, $props);
        }, $uidList);

        return collect($enteties);
    }

    public function all(array $props = []): Collection
    {
        return $this->toCollection($this->findAll()->toArray(), $props);
    }
}
