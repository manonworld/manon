<?php

namespace App\Command\Ddd\CreateDdd\Service\Service;

use App\Command\Ddd\CreateDdd\Service\ServiceCreator;

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
