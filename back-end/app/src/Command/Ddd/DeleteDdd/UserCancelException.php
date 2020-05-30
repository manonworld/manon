<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Command\Ddd\DeleteDdd;

/**
 * Thrown when the user cancels a deletion command
 *
 * @author mosta <info@manonworld.de>
 */
class UserCancelException extends \Exception {
    
    public function __construct() {
        parent::__construct("User Canceled Deletion", 500);
    }
    
}
