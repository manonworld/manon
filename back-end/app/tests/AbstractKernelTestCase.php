<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;

/**
 * @covers \App\Command\CreateDdd\CreateDddCommand
 */
class AbstractKernelTestCase extends KernelTestCase {

    /**
     * @property mixed $kernel
     */
    protected static $kernel;

    /**
     * @property Application $application
     */
    protected Application $application;

    /**
     * Sets up the tests and prepares the basic helpers
     */
    protected function setUp(): void
    {
        self::$kernel       = static::createKernel();
        $this->application  = new Application(self::$kernel);
    }

    /**
     * Tears down the tests and unsets the basic helpers
     */
    protected function tearDown(): void
    {
        self::$kernel = null;
        unset($this->application);
    }

}