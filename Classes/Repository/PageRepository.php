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

use LMS\Facade\StaticCreator;
use Tightenco\Collect\Support\Collection;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 *
 * @author         Borulko Sergey <borulkosergey@icloud.com>
 */
class PageRepository extends \TYPO3\CMS\Frontend\Page\PageRepository
{
    use StaticCreator;

    /**
     * @param array $uidList
     *
     * @return \Tightenco\Collect\Support\Collection
     */
    public function findByIds(array $uidList): Collection
    {
        $pages = [];

        foreach ($uidList as $uid) {
            $pages[] = $this->getPage_noCheck((int)$uid);
        }

        return Collection::make($pages);
    }

    /**
     * Find all sub pages for passed page
     *
     * @param int $page
     *
     * @return \Tightenco\Collect\Support\Collection
     */
    public function findSubPages(int $page): Collection
    {
        $result = $this->getMenu($page, 'uid', 'sorting', 'nav_hide = 0');

        $uidList = [];
        foreach ($result as $record) {
            $uidList[] = $record['uid'];
            $uidList = array_merge($uidList, $this->findSubPages($record['uid'])->toArray());
        }

        return Collection::make($uidList);
    }
}
