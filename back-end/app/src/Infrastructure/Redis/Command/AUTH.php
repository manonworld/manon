<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Infrastructure\Redis\Command;

use Predis\Command\Command;

/**
 * Authenticates with Redis cluster
 *
 * @author mosta <info@manonworld.de>
 */
class AUTH extends Command
{
    
    /**
     *
     * Authenticates with Redis
     *
     * @return string
     */
    public function getId(): string
    {
        return 'AUTH';
    }
}
