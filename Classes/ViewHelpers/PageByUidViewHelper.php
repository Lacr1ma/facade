<?php
declare(strict_types=1);

namespace LMS3\Support\ViewHelpers;

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

use LMS3\Support\Repository\PageRepository;

/**
 * @author Borulko Sergey <borulkosergey@icloud.com>
 */
class PageByUidViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * Page uid
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('uid', 'int', '', true);
    }

    /**
     * @return array
     */
    public function render(): array
    {
        $uid = (int)$this->arguments['uid'];

        return (array) PageRepository::make()->findByIds([$uid])->first();
    }
}