<?php

namespace App\Command\Ddd\DeleteDdd\Service;

use App\Command\Ddd\DeleteDdd\DomainDeleter;

class DeleteDomain
{

    private DomainDeleter $domainDeleter;

    public function __construct(DomainDeleter $domainDeleter)
    {
        $this->domainDeleter = $domainDeleter;
    }

    public function execute(string $name)
    {
        $this->domainDeleter->delete($name);
    }
}
