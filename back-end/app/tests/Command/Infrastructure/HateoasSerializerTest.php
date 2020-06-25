<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Tests\Infrastructure;

use App\Infrastructure\Serializer\HateoasSerializer;
use App\Tests\AbstractKernelTestCase;

/**
 * Tests the Hateoas serializer methods
 *
 * @covers App\Infrastructure\Serializer\HateoasSerializer
 * @author mosta <info@manonworld.de>
 */
class HateoasSerializerTest extends AbstractKernelTestCase {
    
    /**
     *
     * @var HateoasSerializer
     */
    private HateoasSerializer $serializer;
    
    /**
     * 
     * @return HateoasSerializer
     */
    public function setUp(): void
    {
        $this->serializer = new HateoasSerializer;
        parent::setUp();
    }
    
    /**
     * @covers App\Infrastructure\Serializer\HateoasSerializer::serialize
     */
    public function testSerialize()
    {
        $originalData = ['testkey' => 'testval'];
        $serializedData = $this->serializer->serialize($originalData);
        $this->assertEquals('{"testkey":"testval"}', $serializedData);
    }
    
    /**
     * @covers App\Infrastructure\Serializer\HateoasSerializer::serialize
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
