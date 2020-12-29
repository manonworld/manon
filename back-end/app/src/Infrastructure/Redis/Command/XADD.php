<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Infrastructure\Redis\Command;

use Predis\Command\Command;

/**
 * Creates a Stream
 *
 * @author mosta <info@manonworld.de>
 */
class XADD extends Command
{
    
    /**
     *
     * Creates a stream
     *
     * @return string
     */
    public function getId(): string
    {
        return 'XADD';
    }
}
