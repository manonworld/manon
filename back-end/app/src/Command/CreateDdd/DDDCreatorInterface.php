<?php

namespace App\Command\CreateDdd;

interface DDDCreatorInterface {

    /**
     * Creates the directories with its subdirectories recursively
     * (Based on the default max recursion depth of 256)
     * 
     * @param array $dirs Directory structure
     * @param string $path Path of the <implementation> Directory
     * @throws RecursionException
     * @return void
     * 
     */
    public function create( array $dirs, string $path ): void;


}