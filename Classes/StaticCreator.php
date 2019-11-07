<?php
declare(strict_types = 1);

namespace LMS3\Support;

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

/**
 * @author Sergey Borulko <borulkosergey@icloud.com>
 */
trait StaticCreator
{
    /**
     * @return $this
     */
    public static function make(): self
    {
        return new static();
    }

    /**
     * @psalm-suppress MoreSpecificReturnType
     *
     * @param array  $properties
     * @param object $entity
     *
     * @return $this
     */
    public static function makeWithProps(array $properties = [], object $entity = null): self
    {
        $entity = $entity ?: new static();

        foreach ($properties as $propertyName => $propertyValue) {
            $entity->_setProperty($propertyName, $propertyValue);
        }

        return $entity;
    }
}
