<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Infrastructure\Redis;

use Predis\Connection\ConnectionInterface;
use Predis\Command\CommandInterface;
use Predis\Client as RedisClient;

use App\Infrastructure\Exception\UnimplementedException;
use App\Infrastructure\Redis\Command\AUTH;

/**
 * Client for Redis Implementation
 *
 * @author mosta <info@manonworld.de>
 */
class Client extends RedisClient implements ConnectionInterface
{
    
    /**
     *
     * TODO: Switch connection string to docker encrypted env variables
     *
     * @param mixed $options
     * @param mixed $parameters
     */
    public function __construct($parameters, $options)
    {
        $dsn = getenv('REDIS_DSN');
        
        if ($dsn) {
            $parameters = $dsn;
        }
        
        parent::__construct($parameters, $options);
    }
    
    /**
     *
     * Connects to the Redis instance
     *
     * @return void
     */
    public function connect()
    {
        parent::connect();
    }
    
    /**
     * Authenticates with Redis server
     *
     * TODO: Convert password from static plain text to encrypted docker env variable
     * TODO: Write a try catch block after converting to docker encrypted env variable
     * TODO: throw auth exception
     * @return void
     */
    public function auth(): void
    {
        $auth = new AUTH;
        $auth->setArguments(['manononetool']); /** TODO: password to convert **/
        
        $this->executeCommand($auth);
    }

    /**
     * Disconnects the client
     *
     * @return void
     */
    public function disconnect()
    {
        parent::disconnect();
    }

    /**
     *
     * Executes a given command
     *
     * @param CommandInterface $command
     */
    public function executeCommand(CommandInterface $command)
    {
        $id = $command->getId();
        $args = $command->getArguments();
        
        $redisCmd = parent::getProfile()->createCommand($id, $args);
        
        return parent::executeCommand($redisCmd);
    }
    
    /**
     *
     * Defines a custom Redis command
     *
     * @param CommandInterface $command
     * @return mixed
     */
    public function defineAndExecute(CommandInterface $command)
    {
        $id = $command->getId();
        $args = $command->getArguments();
        
        parent::getProfile()->defineCommand($id, get_class($command));
        
        return parent::$id(...$args);
    }


    /**
     *
     * Checks if the client is currently connected
     *
     * @return bool
     */
    public function isConnected(): bool
    {
        return parent::isConnected();
    }

    /**
     *
     * Reads a response from a given command
     *
     * @param CommandInterface $command
     */
    public function readResponse(CommandInterface $command)
    {
        throw new UnimplementedException('Please use executeCommand() as a shortcut instead');
    }

    /**
     *
     * Writes a request to a given command
     *
     * @param CommandInterface $command
     */
    public function writeRequest(CommandInterface $command)
    {
        throw new UnimplementedException('Please use executeCommand() as a shortcut instead');
    }
}
