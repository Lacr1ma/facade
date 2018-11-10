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

use LMS3\Support\ObjectManageable;
use LMS3\Support\Tests\Build\{User, UserRepository};
use TYPO3\CMS\Extbase\Domain\Model\FrontendUserGroup;

/**
 * @author Borulko Sergey <borulkosergey@icloud.com>
 */
class CRUDTest extends \TYPO3\TestingFramework\Core\Functional\FunctionalTestCase
{
    /** @var array */
    protected $testExtensionsToLoad = ['typo3conf/ext/support'];

    /** @var string */
    protected $fixturePrefix = __DIR__ . '/../../Fixtures/Repository/';

    /** @var UserRepository */
    protected $repository;

    /**
     * @throws \Doctrine\DBAL\DBALException
     * @throws \TYPO3\TestingFramework\Core\Exception
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->repository = ObjectManageable::createObject(UserRepository::class);

        $this->importDataSet($this->fixturePrefix . __FUNCTION__ . '.xml');
    }

    /**
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->repository);
    }

    /**
     * @test
     * @return void
     */
    public function ensureProduced(): void
    {
        $name = 'TYPO3';
        $email = 'demo@domain.ltd';

        /** @var User $user */
        $user = $this->repository->produce(compact('name', 'email'));

        $this->assertSame($user->getName(), $name);
        $this->assertSame($user->getEmail(), $email);
    }

    /**
     * @test
     * @return void
     */
    public function ensureDestroyed(): void
    {
        $initialCount = $this->repository->countAll();

        $this->repository->destroy($this->repository->findAll()->getFirst());

        $this->assertEquals(--$initialCount, $this->repository->countAll());
    }

    /**
     * @test
     * @return void
     */
    public function ensureUpgraded(): void
    {
        /** @var User $user */
        $user = $this->repository->findAll()->getFirst();
        $user->setName('modified');

        $this->repository->upgrade($user);

        $this->assertEquals($this->repository->findAll()->getFirst()->getName(), 'modified');
    }

    /**
     * @test
     * @return void
     */
    public function ensurePersisted(): void
    {
        $user = new User();
        $user->setName('new');

        $initialCount = $this->repository->countAll();

        $this->repository->persist($user);

        $this->assertEquals(++$initialCount, $this->repository->countAll());
    }

    /**
     * @test
     * @return void
     */
    public function ensureModelNameIsCorrect(): void
    {
        $this->assertEquals(User::class, $this->repository->getEntityClassName());
    }

    /**
     * @test
     * @return void
     */
    public function returnFalseWhenDestroyObjectIsInvalid(): void
    {
        $status = $this->repository->destroy(null);

        $this->assertFalse($status);
    }

    /**
     * @test
     * @return void
     */
    public function returnFalseWhenColdNotBePersisted(): void
    {
        $status = $this->repository->persist(new FrontendUserGroup());

        $this->assertFalse($status);
    }
}
