<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Infrastructure\Serializer;

/**
 *
 * @author mosta <info@manonworld.de>
 */
interface SerializerInterface
{
    
    /**
     *
     * Serializes an object
     *
     * @param mixed $source
     * @param string $format
     * @return mixed
     * @throws SerializerException
     */
    public function serialize($object, string $type);
}
