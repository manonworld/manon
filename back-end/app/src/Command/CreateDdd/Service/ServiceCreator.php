<?php

namespace App\Command\CreateDdd\Service;

use App\Command\CreateDdd\DDDCreator;
use App\Command\CreateDdd\CreateDDDConsts;

class ServiceCreator extends DDDCreator {

    /**
     * Prepares the default directory path for the domain
     * 
     * @param string $dir Base directory
     * @param string $name Name of the domain we will create
     * @return string Full path of the domain includes its name
     */
    public function getSvcDir( string $dir, string $name ): string
    {
        return sprintf( CreateDDDConsts::DEF_SVC_DIR(), $dir, ucfirst( $name ) );
    }

}