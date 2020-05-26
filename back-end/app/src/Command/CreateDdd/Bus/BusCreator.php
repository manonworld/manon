<?php

namespace App\Command\CreateDdd\Bus;

use App\Infrastructure\Command\DirectoryCreator;
use App\Command\CreateDdd\DDDCreator;
use App\Command\CreateDdd\CreateDDDConsts;
use App\Command\CreateDdd\RecursionException;

/**
 * Bus Creator
 * 
 * Creates bus directories for a new domain
 * 
 * @method string getDefBusDir( string $dir, string $name )
 */
class BusCreator extends DDDCreator {

    /**
     * Prepares the default bus directory path
     * 
     * @param string $dir Base directory where we will create the bus inside
     * @param string $name Name of the domain we will create
     * @return string Full path of the domain includes its name
     */
    public function getDefBusDir( string $dir, string $name ): string
    {
        return sprintf( CreateDDDConsts::DEF_BUS_DIR(), $dir, ucfirst( $name ) );
    }

}