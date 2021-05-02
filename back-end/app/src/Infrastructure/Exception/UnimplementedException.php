<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Infrastructure\Exception;

/**
 * Description of UnimplementedException
 *
 * @author mosta <info@manonworld.de>
 */
class UnimplementedException extends \LogicException
{
    
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
