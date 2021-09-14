<?php
declare(strict_types = 1);

namespace LMS\Facade\Controller\Base;

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

use LMS\Facade\Extbase\Redirect;
use TYPO3\CMS\Extbase\{DomainObject\DomainObjectInterface,
    Mvc\Controller\ActionController,
    Persistence\RepositoryInterface};
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
abstract class ApiController extends ActionController
{
    /**
     * {@inheritdoc}
     */
    public $view;

    public Redirect $redirect;

    public function __construct()
    {
        $this->redirect = GeneralUtility::makeInstance(Redirect::class);
    }

    protected function getEntity(int $uid): ?DomainObjectInterface
    {
        return $this->getResourceRepository()->findByUid($uid);
    }

    /**
     * Should return the Repository of the Resource
     */
    abstract protected function getResourceRepository(): RepositoryInterface;

    /**
     * @see \TYPO3\CMS\Extbase\Mvc\View\JsonView::setVariablesToRender()
     */
    abstract protected function getRootName(): string;
}
