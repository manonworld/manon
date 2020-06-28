<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Tests\Infrastructure\Redis;

use App\Tests\AbstractKernelTestCase;
use App\Infrastructure\Redis\Command\AUTH;
use App\Infrastructure\Redis\Command\XADD;

/**
 * Tests Redis client functionalities
 * 
 * @covers App\Infrastructure\Redis\Client
 *
 * @author mosta <info@manonworld.de>
 */
class ClientTest extends AbstractKernelTestCase
{
    
    /**
     * @covers App\Infrastructure\Redis\Client::connect()
     */
    public function testIfClientConnectsSuccessfully()
    {
        $this->assertNull($this->redis->connect());
    }
    
    /**
     * @covers App\Infrastructure\Redis\Client::disconnect()
     */
    public function testIfClientDisconnectsSuccessfully()
    {
        $this->redis->connect();
        $this->assertNull($this->redis->disconnect());
    }
    
    /**
     * @covers App\Infrastructure\Redis\Client::isConnected()
     */
    public function testIfIsConnectsReturnsTrueWhenConnected()
    {
        $this->redis->connect();
        $this->assertTrue($this->redis->isConnected());
    }
    
    /**
     * @covers App\Infrastructure\Redis\Client::isConnected()
     */
    public function testIfIsConnectedReturnsFalseWhenDisconnected()
    {
        $this->redis->connect();
        $this->redis->disconnect();
        $this->assertFalse($this->redis->isConnected());
    }
    
    /**
     * @covers App\Infrastructure\Redis\Command\XADD::getId
     * @covers App\Infrastructure\Redis\Client::defineAndExecute
     */
    public function testDefineAndExecuteHasDefinedXADDSuccessfully()
    {
        $this->redis->connect();
        $this->redis->auth();
        $xadd = new XADD;
        $xadd->setArguments(['manon', "*", 'firstName', 'Manon', 'lastName', 'Niazi']);
        $res = $this->redis->defineAndExecute($xadd);
        
        $this->assertTrue(is_string($res));
    }
    
}
