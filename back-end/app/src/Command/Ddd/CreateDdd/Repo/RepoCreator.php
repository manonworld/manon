<?php

namespace App\Command\Ddd\CreateDdd\Repo;

use App\Command\Ddd\CreateDdd\DDDCreator;
use App\Command\Ddd\CreateDdd\CreateDDDConsts;

class RepoCreator extends DDDCreator
{

    /**
     * Prepares the default directory path for the domain
     *
     * @param string $dir Base directory
     * @param string $name Name of the domain we will create
     * @return string Full path of the domain includes its name
     */
    public function getRepoDir(string $dir, string $name): string
    {
        return sprintf(CreateDDDConsts::DEF_REPO_DIR(), $dir, ucfirst($name));
    }
}
