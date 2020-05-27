<?php

namespace App\Command\CreateDdd\Service\Service;

use App\Command\CreateDdd\Service\ServiceCreator;
use App\Command\CreateDdd\CreateDDDConsts;

class CreateService {

    private ServiceCreator $serviceCreator;

    public function __construct(ServiceCreator $serviceCreator)
    {
        $this->serviceCreator = $serviceCreator;
    }

    public function execute( string $dir, string $name )
    {
        $defSvcPath = $this->serviceCreator->getSvcDir( $dir, $name );

        $this->serviceCreator->create( [] , $defSvcPath );
    }

}