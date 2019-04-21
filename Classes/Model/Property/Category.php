<?php
declare(strict_types = 1);

namespace LMS3\Support\Model\Property;

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

use LMS3\Support\Extbase\QueryBuilder;
use Tightenco\Collect\Support\Collection;

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
trait Category
{
    use QueryBuilder;

    /**
     * @return \Tightenco\Collect\Support\Collection
     */
    public function getCategories(): Collection
    {
        return $this->findCategories();
    }

    /**
     * @return \Tightenco\Collect\Support\Collection
     */
    private function findCategories(): Collection
    {
        $builder = $this->getQueryBuilderFor('sys_category');

        $constraints = [
            $builder->expr()->in('uid', $this->findRelations()->toArray()),
        ];

        return Collection::make(
            $builder
                ->select(...['uid', 'title', 'parent'])
                ->from('sys_category')
                ->where(...$constraints)
                ->execute()
                ->fetchAll()
        );
    }

    /**
     * @return \Tightenco\Collect\Support\Collection
     */
    private function findRelations(): Collection
    {
        $builder = $this->getQueryBuilderFor('sys_category_record_mm');

        $constraints = [
            $builder->expr()->eq('uid_foreign', $builder->createNamedParameter($this->getUid(), \PDO::PARAM_INT)),
            $builder->expr()->eq('tablenames', $builder->createNamedParameter(self::getTableName()))
        ];

        return Collection::make(
            $builder
                ->select('uid_local')
                ->from('sys_category_record_mm')
                ->where(...$constraints)
                ->execute()
                ->fetchAll()
        )->add(0)->flatten();
    }

    /**
     * Returns the name of the model table
     *
     * @return string
     */
    abstract public static function getTableName(): string;
}
