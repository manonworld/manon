<?php

namespace App\Command\CreateDdd\Controller\Service;

use App\Command\CreateDdd\Controller\ControllerCreator;
use App\Command\CreateDdd\CreateDDDConsts;

class CreateController {

    private ControllerCreator $controllerCreator;

    public function __construct(ControllerCreator $controllerCreator)
    {
        $this->controllerCreator = $controllerCreator;
    }

    public function execute( string $dir, string $name )
    {
        $defConPath = $this->controllerCreator->getConDir( $dir, $name );

        $this->controllerCreator->create( [] , $defConPath );
    }

}