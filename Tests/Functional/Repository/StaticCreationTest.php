<?php
declare(strict_types = 1);

namespace LMS3\Support\Tests\Functional\Repository;

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

use LMS3\Support\Tests\Build\ExampleRepository;

/**
 * @author Borulko Sergey <borulkosergey@icloud.com>
 */
class StaticCreationTest extends \TYPO3\TestingFramework\Core\Functional\FunctionalTestCase
{
    /** @var array */
    protected $testExtensionsToLoad = ['typo3conf/ext/support'];

    /**
     * @test
     * @return void
     */
    public function ensureRepositoryCouldBeStaticallyCreated(): void
    {
        $this->assertInstanceOf(ExampleRepository::class, ExampleRepository::make());
    }

    /**
     * @test
     * @return void
     */
    public function ensureInitializeObjectHasBeenCalled(): void
    {
        $this->assertEquals('initialized', ExampleRepository::make()->name);
    }
}
