<?php
declare(strict_types = 1);

namespace LMS3\Support\Controller;

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

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
abstract class AbstractApiController extends Base\ApiController
{
    /**
     * @param int $entity
     */
    public function showAction(int $entity): void
    {
        $this->checkAccess();

        $this->view->setVariablesToRender([$this->getRootName()]);

        $this->view->assign($this->getRootName(), [$this->getResourceRepository()->findByUid($entity)]);
    }

    /**
     * Just render all the existing items related to specific resource
     */
    public function listAction(): void
    {
        $this->checkAccess();

        $this->view->setVariablesToRender([$this->getRootName()]);

        $this->view->assign($this->getRootName(), $this->getResourceRepository()->findAll());
    }

    /**
     * @param \TYPO3\CMS\Extbase\DomainObject\AbstractEntity $entity
     * @param array                                          $data
     */
    public function editAction(AbstractEntity $entity, array $data): void
    {
        $this->checkAccess();

        $this->view->setVariablesToRender([$this->getRootName()]);

        foreach ($data as $propertyName => $propertyValue) {
            $entity->_setProperty($propertyName, $propertyValue);
        }

        $this->view->assign($this->getRootName(), $this->getResourceRepository()->upgrade($entity));
    }

    /**
     * @param array $data
     */
    public function createAction(array $data): void
    {
        $this->checkAccess();

        $repository = $this->getResourceRepository();

        $this->view->assign('value', [
            'success' => $repository->persist($repository->produce($data))
        ]);
    }

    /**
     * @param \TYPO3\CMS\Extbase\DomainObject\AbstractEntity $entity
     */
    public function destroyAction(AbstractEntity $entity): void
    {
        $this->checkAccess();

        $this->view->assign('value', [
            'success' => $this->getResourceRepository()->destroy($entity)
        ]);
    }

    /**
     * @param string $message
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function failAction(string $message): ResponseInterface
    {
        return self::createWith($message);
    }
}
