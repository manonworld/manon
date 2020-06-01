<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Tests\Infrastructure;

use App\Infrastructure\Serializer\JmsSerializer;
use App\Tests\AbstractKernelTestCase;

/**
 * Tests the serializer methods
 *
 * @covers App\Infrastructure\Serializer\JmsSerializer
 * @author mosta <info@manonworld.de>
 */
class SerializerTest extends AbstractKernelTestCase {
    
    /**
     *
     * @var JmsSerializer
     */
    private JmsSerializer $serializer;
    
    /**
     * 
     * @return JmsSerializer
     */
    public function setUp(): void {
        $this->serializer = new JmsSerializer;
        parent::setUp();
    }
    
    /**
     * @covers App\Infrastructure\Serializer\JmsSerializer::serialize
     */
    public function testSerialize()
    {
        $originalData = ['testkey' => 'testval'];
        $serializedData = $this->serializer->serialize($originalData);
        $this->assertEquals('{"testkey":"testval"}', $serializedData);
    }
    
    /**
     * @covers App\Infrastructure\Serializer\JmsSerializer::serialize
     */
    public function testSerializeThrowsSerializerException()
    {
        $this->expectException('App\Infrastructure\Serializer\SerializerException');
        $this->expectExceptionCode(500);
        $this->expectExceptionMessage('The format "array" is not supported for serialization.');
        $originalData = ['testkey' => 'testval'];
        $this->serializer->serialize($originalData, 'array');
    }
    
}
