<?php

namespace App\Command\CreateDdd;

use App\Infrastructure\Command\DirectoryCreator;
use App\Command\CreateDdd\DDDCreatorInterface;

/**
 * DDDCreator
 * 
 * Abstraction Layer for the creator of the DDD directory structure
 * 
 * @property DirectoryCreator | null $creator
 * 
 * @method void create( array $dirs, string $path )
 */
abstract class DDDCreator implements DDDCreatorInterface {

    /**
     * @property DirectoryCreator | null $creator
     */
    protected ?DirectoryCreator $creator = null;

    /**
     * 
     * New Instance
     * 
     * @param DirectoryCreator $creator
     */
    public function __construct(DirectoryCreator $creator)
    {
        $this->creator = $creator;
    }

    /**
     * Creates the directories with its subdirectories recursively
     * (Based on the default max recursion depth of 256)
     * 
     * @param array $dirs Directory structure
     * @param string $path Path of the Bus Directory
     * @throws RecursionException
     * @return void
     * 
     * { @inheritdoc }
     * 
     */
    public function create( array $dirs, string $path ): void
    {
        if(!$path){
            throw new \InvalidArgumentException('Invalid Path to DDD Directory');
        }
        try {
            if( empty( $dirs ) ) {
                $this->creator->create( $path );
            } else {
                foreach( $dirs as $key => $val ) {
                    if( is_array( $val ) ) {
                        $this->creator->create( $path . ucfirst( $key ) );
                        $this->create( $val, $path . ucfirst( $key ) );
                    } else {
                        $this->creator->create( $path . "/" . ucfirst( $val ) );
                    }
                }
            }
        } catch (\Exception $e) {
            throw new RecursionException($e);
        }
        
    }

    /**
     * Prepares the default directory path for the domain
     * 
     * @param string $dir Base directory
     * @param string $name Name of the domain we will create
     * @return string Full path of the domain includes its name
     */
    public function getDefDir( string $dir, string $name ): string
    {
        return sprintf( CreateDDDConsts::DEF_DIR(), $dir, ucfirst( $name ) );
    }

}