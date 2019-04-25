<?php
declare(strict_types = 1);

namespace LMS3\Support\Repository\Relation;

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

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
trait Group
{
    /**
     * @param array $uidList
     *
     * @return \Tightenco\Collect\Support\Collection
     */
    public function findByGroups(array $uidList): Collection
    {
        $entities = [];

        foreach ($uidList as $groupUid) {
            $entities[] = $this->findByGroup($groupUid);
        }

        return Collection::make($entities)->collapse()->unique();
    }

    /**
     * @param int $group
     *
     * @return \Tightenco\Collect\Support\Collection
     */
    public function findByGroup(int $group): Collection
    {
        $query = $this->createQuery();

        try {
            $constraints = $query->contains('group', [$group]);
        } catch (\Exception $e) {
            return [];
        }

        return Collection::make(
            $query->matching($constraints)->execute()->toArray()
        );
    }

    /**
     * @return \Tightenco\Collect\Support\Collection
     */
    public function findWithoutGroups(): Collection
    {
        $query = $this->createQuery();
        $constraints = $query->equals('group', 0);

        return Collection::make(
            $query->matching($constraints)->execute()->toArray()
        );
    }
}