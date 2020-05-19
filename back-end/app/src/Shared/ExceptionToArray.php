<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Shared;

/**
 * Description of ExceptionToArray
 *
 * @author Mostafa A. Hamid <info@manonworld.de>
 */
class ExceptionToArray {
    
    /**
     * 
     * Converts the exception to array
     * 
     * @param \Exception $e
     * @return array
     */
    public static function exec(\Exception $e): array
    {
        $previous = false;
        
        if( $e->getPrevious() ) {
            $previous = true;
        }
        
        return [
            'status'        => 'error', 
            'type'          => get_class($e), 
            'message'       => $e->getMessage(), 
            'file'          => $e->getFile(), 
            'line'          => $e->getLine(),
            'previous'      => [
                    'file'      => $previous ? $e->getPrevious()->getFile() : null,
                    'line'      => $previous ? $e->getPrevious()->getLine() : null,
                    'message'   => $previous ? $e->getPrevious()->getMessage() : null
                ],
        ];
    }
    
}
