<?php
declare(strict_types = 1);

namespace LMS3\Support\Extbase;

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

use LMS3\Support\ObjectManageable;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder as CoreQueryBuilder;

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
trait QueryBuilder
{
    /**
     * Returns an instance of the query builder for passed table
     *
     * @param string $table
     *
     * @return \TYPO3\CMS\Core\Database\Query\QueryBuilder
     */
    protected function getQueryBuilderFor(string $table): CoreQueryBuilder
    {
        return $this->getConnection()->getQueryBuilderForTable($table);
    }

    /**
     * Returns an instance of connection pool
     *
     * @return \TYPO3\CMS\Core\Database\ConnectionPool
     */
    protected function getConnection(): ConnectionPool
    {
        return ObjectManageable::createObject(ConnectionPool::class);
    }
}
