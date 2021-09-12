<?php
declare(strict_types = 1);

namespace LMS\Facade\Extbase;

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

use LMS\Facade\ObjectManageable;
use TYPO3\CMS\Core\Http\Response;
use TYPO3\CMS\Core\Http\ResponseFactory;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
class Redirect
{
    /**
     * Attempt to redirect user to requested page uid
     */
    public static function toPage(int $pid): Response
    {
        return Redirect::toUri(
            self::uriFor($pid)
        );
    }

    /**
     * Attempt to redirect user to the passed URI
     */
    public static function toUri(string $uri, int $status = 303): Response
    {
        return self::responseFactory()
            ->createResponse($status)
            ->withAddedHeader('location', $uri);
    }

    /**
     * Build the url for the passed page
     */
    public static function uriFor(int $pid, bool $absolute = false): string
    {
        return Redirect::uriBuilder()
            ->setLinkAccessRestrictedPages(true)
            ->setCreateAbsoluteUri($absolute)
            ->setTargetPageUid($pid)
            ->build();
    }

    public static function uriBuilder(): UriBuilder
    {
        return ObjectManageable::createObject(UriBuilder::class)->reset();
    }

    public static function responseFactory(): ResponseFactory
    {
        return ObjectManageable::createObject(ResponseFactory::class);
    }
}
