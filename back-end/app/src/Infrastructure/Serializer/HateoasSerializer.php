<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Infrastructure\Serializer;

use Hateoas\HateoasBuilder;
use Hateoas\Hateoas;
use App\Infrastructure\Serializer\SerializerInterface;
use App\Infrastructure\Serializer\SerializerException;

/**
 * Serializes an object for REST response
 *
 * @author mosta <info@manonworld.de>
 */
class HateoasSerializer implements SerializerInterface
{
    
    public HateoasBuilder $builder;
    
    /**
     *
     * @var Hateoas $hateoas
     */
    private Hateoas $hateoas;
    
    
    public function __construct(HateoasBuilder $builder)
    {
        $this->hateoas = $builder->create()->build();
    }
    
    /**
     *
     * Serializes an object
     *
     * @param mixed $source
     * @param string $format
     * @return mixed
     * @throws SerializerException
     */
    public function serialize($object, string $type = 'json')
    {
        try {
            return $this->hateoas->serialize($object, $type);
        } catch (\Exception $e) {
            throw new SerializerException($e->getMessage(), 500, $e);
        }
    }
}
