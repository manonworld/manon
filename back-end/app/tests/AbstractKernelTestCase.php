<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;

/**
 * @covers \App\Command\CreateDdd\CreateDddCommand
 */
class AbstractKernelTestCase extends KernelTestCase {

    /**
     * 
     */
    protected static $kernel;
    protected Application $application;

    protected function setUp(): void
    {
        self::$kernel       = static::createKernel();
        $this->application  = new Application(self::$kernel);
    }

    protected function tearDown(): void
    {
        self::$kernel = null;
        unset($this->application);
    }

}