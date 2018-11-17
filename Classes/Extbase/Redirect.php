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
use TYPO3\CMS\Core\Utility\HttpUtility;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
trait Redirect
{
    /**
     * Attempt to redirect user to requested page uid
     *
     * @api
     *
     * @param int $pid
     */
    public static function toPage(int $pid): void
    {
        $pageUri = Redirect::uriBuilder()->setTargetPageUid($pid)->build();

        Redirect::toUri($pageUri);
    }

    /**
     * Attempt to redirect user to the passed URI
     *
     * @api
     *
     * @param string $uri
     * @param string $status
     */
    public static function toUri(string $uri, $status = HttpUtility::HTTP_STATUS_303): void
    {
        HttpUtility::redirect($uri, $status);
    }

    /**
     * Create a uri Builder Instance
     *
     * @api
     *
     * @return \TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder
     */
    public static function uriBuilder(): UriBuilder
    {
        return ObjectManageable::createObject(UriBuilder::class)->reset();
    }
}
