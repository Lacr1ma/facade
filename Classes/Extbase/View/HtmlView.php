<?php
declare(strict_types = 1);

namespace LMS3\Support\Extbase\View;

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
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
trait HtmlView
{
    /**
     * Renders the requested view
     *
     * @param string $templatePath
     * @param array  $variables
     *
     * @return string
     */
    public function renderView(string $templatePath, array $variables = []): string
    {
        $view = $this->createView();

        $view->setFormat('html');
        $view->assignMultiple($variables);
        $view->setTemplatePathAndFilename($templatePath);

        return $view->render();
    }

    /**
     * @return \TYPO3\CMS\Fluid\View\StandaloneView
     */
    public function createView(): StandaloneView
    {
        return ObjectManageable::createObject(StandaloneView::class);
    }
}
