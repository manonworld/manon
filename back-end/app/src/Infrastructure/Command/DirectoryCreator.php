<?php

declare( strict_types = 1 );

namespace App\Infrastructure\Command;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

/**
 * 
 * Drectory Creator
 * 
 * Creates directories according to
 * the path passed to it
 * 
 * @property Filesystem | null $fileSys
 * 
 * @method void create( string $path )
 * 
 */
class DirectoryCreator {

    /**
     * @property Filesystem $fileSys
     */
    private ?Filesystem $fileSys = null;

    /**
     * New Instance
     * 
     * @param Filesystem
     */
    public function __construct( Filesystem $fileSys )
    {
        $this->fileSys = $fileSys;
    }

    /**
     * Creates the directory in the given path
     * 
     * @param string $path
     * @throws IOExceptionInterface
     * @return void
     */
    public function create( string $path ): void
    {
        try {
            $this->fileSys->mkdir( $path );
        } catch ( IOExceptionInterface $ioe ) {
            throw $ioe;
        }
    }

    /**
     * Removes the (directory | file | symlink) from the given path
     * 
     * @param string $path
     * @throws IOExceptionInterface
     * @return void
     */
    public function remove( string $path ): void
    {
        try {
            $this->fileSys->remove( $path );
        } catch ( IOExceptionInterface $ioe ) {
            throw $ioe;
        }
    }

}