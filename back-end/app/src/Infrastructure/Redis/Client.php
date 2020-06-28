<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Infrastructure\Redis;

use Predis\ {
    Connection\ConnectionInterface,
    Command\CommandInterface,
    Client as RedisClient
};

use App\Infrastructure\ { 
    Exception\UnimplementedException, 
    Redis\Command\AUTH 
};

/**
 * Client for Redis Implementation
 *
 * @author mosta <info@manonworld.de>
 */
class Client implements ConnectionInterface
{
    
    /**
     *
     * @var Client $client
     */
    private RedisClient $client;
    
    /**
     *
     * TODO: switch to docker encrypted env variables
     *
     * @var array $parameters Parameters of the connection
     */
    private array $parameters = [
        'tcp://redis-master:6379?alias=master'
    ];
    
    /**
     *
     * TODO: switch to docker encrypted env variables
     *
     * @var array $options Options of the connection
     */
    private array $options = ['replication' => true];
    
    /**
     *
     * @tood Switch connection string to docker encrypted env variables
     * @param Client $client
     */
    public function __construct()
    {
        $this->client = new RedisClient($this->parameters, $this->options);
    }
    
    /**
     * 
     * Connects to the Redis instance
     * 
     * @return void
     */
    public function connect()
    {
        $this->client->connect();
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
        $this->client->disconnect();
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
        
        $redisCmd = $this->client->getProfile()->createCommand($id, $args);
        
        return $this->client->executeCommand($redisCmd);
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
        
        $this->client->getProfile()->defineCommand($id, get_class($command));
        
        return $this->client->$id(...$args);
    }


    /**
     *
     * Checks if the client is currently connected
     *
     * @return bool
     */
    public function isConnected(): bool
    {
        return $this->client->isConnected();
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
