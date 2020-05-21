<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Infrastructure\Serializer;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use App\Infrastructure\Serializer\SerializerException;

/**
 * Description of JmsSerializer
 *
 * @author Mostafa A. Hamid <info@manonworld.de>
 */
class JmsSerializer {
    
    /**
     *
     * @var Serializer $serializer
     */
    private Serializer $serializer; 
    
    /**
     * New Instance
     */
    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()
                ->build();
    }
    
    
    /**
     * 
     * Serializes an object
     * 
     * @param mixed $source
     * @param string $type
     * @return mixed
     * @throws SerializerException
     */
    public function serialize($source, string $type = 'json')
    {
        try {
            
            return $this->serializer
                ->serialize($source, $type);
            
        } catch ( \Exception $e ) {
            
            throw new SerializerException(
                $e->getMessage(), 500, $e
            );
            
        }
    }
    
}
