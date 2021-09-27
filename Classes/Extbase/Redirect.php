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

use TYPO3\CMS\Core\SingletonInterface;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Http\ResponseFactory;
use TYPO3\CMS\Extbase\Mvc\Web\Routing\UriBuilder;

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
class Redirect implements SingletonInterface
{
    private static UriBuilder $uri;
    private static ResponseFactory $factory;

    public function __construct(ResponseFactory $factory, UriBuilder $uri)
    {
        self::$factory = $factory;
        self::$uri = $uri->reset();
    }

    public static function toPage(int $pid): ResponseInterface
    {
        $url = self::uriFor($pid);

        return self::toUri($url);
    }

    public static function toUri(string $uri, int $status = 303): ResponseInterface
    {
        $response = self::$factory->createResponse($status);

        return $response->withAddedHeader('location', $uri);
    }

    public static function uriFor(int $pid, bool $absolute = false): string
    {
        return self::$uri
            ->setLinkAccessRestrictedPages(true)
            ->setCreateAbsoluteUri($absolute)
            ->setTargetPageUid($pid)
            ->build();
    }

    public static function factory(): ResponseFactory
    {
        return self::$factory;
    }

    public static function uriBuilder(): UriBuilder
    {
        return self::$uri;
    }
}
