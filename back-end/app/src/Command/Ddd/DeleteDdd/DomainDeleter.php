<?php

namespace App\Command\Ddd\DeleteDdd;

use App\Command\Ddd\DeleteDdd\DeleteDDDConsts;
use App\Infrastructure\Command\DirectoryManager;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class DomainDeleter {
    
    /**
     *
     * @var DirectoryManager $deleter
     */
    private DirectoryManager $deleter;
    
    /**
     * 
     * New Instance
     * 
     * @param DirectoryManager $deleter
     */
    public function __construct( DirectoryManager $deleter )
    {
        $this->deleter = $deleter;
    }
    
    /**
     * 
     * Deletes the directory
     * 
     * @param string $dir
     * @param string $name
     * @return void
     */
    public function delete( string $name ): void
    {
        $this->deleter->remove(
            sprintf( DeleteDDDConsts::DEF_DIR(), ucfirst( $name ) )
        );
    }

}
