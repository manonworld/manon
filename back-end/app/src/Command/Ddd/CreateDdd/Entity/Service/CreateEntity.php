<?php

namespace App\Command\Ddd\CreateDdd\Entity\Service;

use App\Command\Ddd\CreateDdd\Entity\EntityCreator;

class CreateEntity
{

    private EntityCreator $entityCreator;

    public function __construct(EntityCreator $entityCreator)
    {
        $this->entityCreator = $entityCreator;
    }

    public function execute(string $dir, string $name)
    {
        $defEntPath = $this->entityCreator->getEntDir($dir, $name);

        $this->entityCreator->create([], $defEntPath);
    }
}
