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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Context\{Context, Exception\AspectNotFoundException};

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
trait User
{
    /**
     * Retrieve the current user session
     *
     * @param  string $key
     *
     * @return mixed
     */
    public static function session(string $key)
    {
        return $GLOBALS['TSFE']->fe_user->getKey('ses', $key);
    }

    /**
     * Add new data to the user session
     *
     * @param  string $key
     * @param  mixed  $value
     */
    public static function storeSession(string $key, $value): void
    {
        $GLOBALS['TSFE']->fe_user->setAndSaveSessionData($key, $value);
    }

    /**
     * Retrieve the currently logged in user identifier
     *
     * @return int
     */
    public static function currentUid(): int
    {
        return (int)$GLOBALS['TSFE']->fe_user->user['uid'];
    }

    /**
     * Determine whether user is logged in
     *
     * @return bool
     */
    public static function isLoggedIn(): bool
    {
        try {
            return (bool)self::getTypo3Context()->getPropertyFromAspect('frontend.user', 'isLoggedIn');
        } catch (AspectNotFoundException $e) {
            return false;
        }
    }

    /**
     * Just syntax sugar
     *
     * @return bool
     */
    public static function isNotLoggedIn(): bool
    {
        return !User::isLoggedIn();
    }

    /**
     * Retrieve the Context Instance
     *
     * @return \TYPO3\CMS\Core\Context\Context
     */
    private static function getTypo3Context(): Context
    {
        return GeneralUtility::makeInstance(Context::class);
    }
}
