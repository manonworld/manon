<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use App\Infrastructure\Redis\Client as RedisClient;
use Psr\Container\ContainerInterface;
use App\Infrastructure\Serializer\HateoasSerializer;
use App\Infrastructure\Serializer\JmsSerializer;

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
     *
     * @var RedisClient|null $redis
     */
    protected ?RedisClient $redis = null;
    
    /**
     *
     * @var ContainerInterface $abstractContainer 
     */
    protected static ContainerInterface $abstractContainer;
    
    /**
     *
     * @var HateoasSerializer $hateoas
     */
    protected HateoasSerializer $hateoas;
    
    /**
     *
     * @var JmsSerializer $jms
     */
    protected JmsSerializer $jms;

    /**
     * Sets up the tests and prepares the basic helpers
     */
    protected function setUp(): void
    {
        self::$kernel               = static::createKernel();
        self::bootKernel();
        $this->application          = new Application(self::$kernel);
        self::$abstractContainer    = self::$kernel->getContainer();
        $this->redis                = self::$abstractContainer->get('@redis.client');
        $this->hateoas              = self::$abstractContainer->get('@hateoas.serializer');
        $this->jms                  = self::$abstractContainer->get('@jms.serializer');
    }

    /**
     * Tears down the tests and unsets the basic helpers
     */
    protected function tearDown(): void
    {
        self::$kernel = null;
        unset($this->application);
        unset($this->redis);
    }

}