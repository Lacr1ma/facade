<?php
declare(strict_types = 1);

namespace LMS3\Support\Controller\Base;

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

use TYPO3\CMS\Extbase\Persistence\RepositoryInterface;
use LMS3\Support\Extbase\{User, Response, Action\CouldReturnPsrResponse};

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
abstract class ApiController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    use User, CouldReturnPsrResponse, Response;

    /**
     * @var \TYPO3\CMS\Extbase\Mvc\View\JsonView
     */
    public $view;

    /**
     * Deny the request if denied by endpoint
     * InitializeAction will not work in that case, because we need to use forward
     */
    public function checkAccess(): void
    {
        if (!$this->isAllowed($this->request->getArguments())) {
            $this->forward('fail', null, null, ['message' => 'Access denied']);
        }
    }

    /**
     * Should return the Repository of the Resource
     *
     * @return \TYPO3\CMS\Extbase\Persistence\RepositoryInterface
     */
    abstract protected function getResourceRepository(): RepositoryInterface;

    /**
     * @return string
     * @see setVariablesToRender()
     */
    abstract protected function getRootName(): string;

    /**
     * @param array $requestArguments
     *
     * @return bool
     */
    abstract protected function isAllowed(array $requestArguments = []): bool;
}
