<?php

namespace App\Command\CreateDdd\Repo\Service;

use App\Command\CreateDdd\Repo\RepoCreator;
use App\Command\CreateDdd\CreateDDDConsts;

class CreateRepo {

    private RepoCreator $repoCreator;

    public function __construct(RepoCreator $repoCreator)
    {
        $this->repoCreator = $repoCreator;
    }

    public function execute( string $dir, string $name )
    {
        $defRepoPath = $this->repoCreator->getRepoDir( $dir, $name );

        $this->repoCreator->create( [] , $defRepoPath );
    }

}