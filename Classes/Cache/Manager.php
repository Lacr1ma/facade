<?php

declare(strict_types = 1);

namespace LMS\Facade\Cache;

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

use LMS\Facade\{ObjectManageable, StaticCreator};
use TYPO3\CMS\Core\Cache\CacheManager;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 * @author         Sergey Borulko <borulkosergey@icloud.com>
 */
class Manager
{
    use StaticCreator;

    /**
     * The cache store implementation.
     *
     * @var \TYPO3\CMS\Core\Cache\Frontend\FrontendInterface
     */
    private $cache;

    /**
     * @param string $extKey
     */
    public function __construct(string $extKey)
    {
        $manager = ObjectManageable::createObject(CacheManager::class);

        $this->cache = $manager->getCache($extKey);
    }

    /**
     * Attempt to get the reviously cached data.
     *
     * @return mixed
     */
    public function take(string $key)
    {
        $result = $this->cache->get($key);

        return $result ?: null;
    }

    /**
     * Attempt to save value in cache.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return mixed
     */
    public function put(string $key, $value)
    {
        $this->cache->set($key, $value);

        return $value;
    }
}
