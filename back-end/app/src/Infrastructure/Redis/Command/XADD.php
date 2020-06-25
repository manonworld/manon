<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Redis\Command;

use Predis\Command\{ Command, CommandInterface };

/**
 * Description of XADD
 *
 * @author mosta <info@manonworld.de>
 */
class XADD extends Command implements CommandInterface {
    
    /**
     * 
     * @return string
     */
    public function getId(): string
    {
        return 'XADD';
    }
    
}
