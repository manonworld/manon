<?php

namespace App\Command\CreateDdd\Bus\Service;

use App\Command\CreateDdd\Bus\BusCreator;
use App\Command\CreateDdd\CreateDDDConsts;

/**
 * CreateBus
 * 
 * Creates a new bus directory structure for a specific business domain
 * 
 * @property BusCreator $busCreator
 * 
 * @method void execute( string $dir, string $name )
 */
class CreateBus {

    /**
     * @property BusCreator $busCreator
     */
    private BusCreator $busCreator;

    /**
     * New Instance
     * 
     * @param BusCreator $busCreator
     */
    public function __construct(BusCreator $busCreator)
    {
        $this->busCreator = $busCreator;
    }

    /**
     * Creates a new Bus
     * 
     * 
     */
    public function execute( string $dir, string $name ): void
    {
        $defBusPath = $this->busCreator->getDefBusDir( $dir, $name );

        $defBusDirs = CreateDDDConsts::DEF_BUS_DIRS();

        $this->busCreator->create( $defBusDirs , $defBusPath );
    }

}