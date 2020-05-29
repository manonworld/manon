<?php

namespace App\Command\Ddd\CreateDdd\Controller\Service;

use App\Command\Ddd\CreateDdd\Controller\ControllerCreator;

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