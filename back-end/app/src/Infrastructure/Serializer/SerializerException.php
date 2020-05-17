<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Infrastructure\Serializer;

/**
 * Exception thrown when an error happens in a serializer
 *
 * @author Mostafa A. Hamid <info@manonworld.de>
 */
class SerializerException extends \Exception {
    
    public function __construct(string $message = "", int $code = 500, \Throwable $previous = NULL) {
        parent::__construct($message, $code, $previous);
    }
    
}
