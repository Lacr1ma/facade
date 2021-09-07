<?php
declare(strict_types = 1);

namespace LMS\Facade\Controller;

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

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
abstract class AbstractApiController extends Base\ApiController
{
    public function showAction(int $uid): ResponseInterface
    {
        $this->view->setVariablesToRender([$this->getRootName()]);

        $this->view->assign($this->getRootName(), [$this->getEntity($uid)]);

        return $this->jsonResponse();
    }

    public function indexAction(): ResponseInterface
    {
        $this->view->setVariablesToRender([$this->getRootName()]);

        $this->view->assign($this->getRootName(), $this->getResourceRepository()->all());

        return $this->jsonResponse();
    }

    public function setPropertiesAction(int $uid, array $data): ResponseInterface
    {
        $table = (string)$data['table'];

        unset($data['table']);

        $this->getResourceRepository()->setEntityProperties($uid, $table, $data);

        $this->view->assign('value', ['success' => true]);

        return $this->jsonResponse();
    }

    public function updateAction(int $uid, array $data): ResponseInterface
    {
        if ($entity = $this->getEntity($uid)) {
            foreach ($data as $propertyName => $propertyValue) {
                $entity->_setProperty($propertyName, $propertyValue);
            }

            $entity->save();
        }

        $this->view->assign('value', ['success' => (bool)$entity]);

        return $this->jsonResponse();
    }

    public function storeAction(array $data): ResponseInterface
    {
        $repository = $this->getResourceRepository();

        $this->view->assign('value', [
            'success' => $repository->persist($repository->produce($data))
        ]);

        return $this->jsonResponse();
    }

    public function destroyAction(int $uid): ResponseInterface
    {
        $entity = $this->getEntity($uid);

        $this->view->assign('value', [
            'success' => $entity && $entity->delete()
        ]);

        return $this->jsonResponse();
    }
}
