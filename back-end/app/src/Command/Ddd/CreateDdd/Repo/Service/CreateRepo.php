<?php

namespace App\Command\Ddd\CreateDdd\Repo\Service;

use App\Command\Ddd\CreateDdd\Repo\RepoCreator;

class CreateRepo
{

    private RepoCreator $repoCreator;

    public function __construct(RepoCreator $repoCreator)
    {
        $this->repoCreator = $repoCreator;
    }

    public function execute(string $dir, string $name)
    {
        $defRepoPath = $this->repoCreator->getRepoDir($dir, $name);

        $this->repoCreator->create([], $defRepoPath);
    }
}
