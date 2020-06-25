<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Infrastructure\Redis;

use Predis\{ Connection\ConnectionInterface, Command\CommandInterface, Client };
use App\Infrastructure\Exception\UnimplementedException;

/**
 * Client for Redis Implementation
 * 
 * TODO: Perform Unit Tests
 *
 * @author mosta <info@manonworld.de>
 */
class Client implements ConnectionInterface {
    
    /**
     *
     * @var Client $client
     */
    private Client $client;
    
    /**
     * 
     * TODO: switch to docker encrypted env variables
     *
     * @var array $parameters Parameters of the connection
     */
    private array $parameters = [
        'tcp://redis-master:6379?alias=master', 
        'tcp://redis-replica:6380'
    ];
    
    /**
     *
     * @var CommandInterface $command 
     */
    private CommandInterface $command;
    
    /**
     * 
     * TODO: switch to docker encrypted env variables
     *
     * @var array $options Options of the connection
     */
    private array $options = ['replication' => true];
    
    /**
     * 
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    
    /**
     * TODO: Switch connection string to docker encrypted env variables
     */
    public function connect() 
    {
        $this->client->connect($this->parameters, $this->options);
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
        
        $this->client->getProfile()->createCommand($id, $args);
        
        return $this->client->$id();
    }


    /**
     * 
     * Checks if the client is currently connected
     * 
     * @return bool
     */
    public function isConnected(): bool {
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
