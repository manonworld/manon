<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Command\Ddd\DeleteDdd;

use MyCLabs\Enum\Enum;
use App\Command\Ddd\CreateDdd\CreateDDDConsts;

/**
 * Delete DDD constants
 *
 * @property string $DEF_DIR Default parent directory for the domains created
 *
 * @method string DEF_DIR() Mutator for the DEF_DIR
 * @see App\Command\DeleteDdd::$DEF_DIR
 *
 * @method string DEL_QUEST() Mutator for the DEL_QUEST
 * @see App\Command\DeleteDdd::$DEL_QUEST
 *
 * @author mosta <info@manonworld.de>
 */
class DeleteDDDConsts extends Enum
{
    
    /**
     * @property string $DEF_DIR Default parent directory for the domains created
     */
    private const DEF_DIR       = 'src/%s';
    
    /**
     * @property string $DEL_QUEST The confirmation question for the deletion of the domain
     */
    private const DEL_QUEST     = 'Do you want to delete the domain %s? ';
    
    /**
     * @property string $DESC The description of the delete DDD command
     */
    private const DESC          = 'Deletes a DDD directory structure';
    
    /**
     * @property string $NAME_DESC Name of the domain to delete
     */
    private const NAME_DESC     = 'Name of the domain to delete *';
    
    /**
     * @property string $INFO Name of the domain to delete
     */
    private const INFO          = 'Deleting Directory Structure For The Domain: %s';
    
    /**
     * @property string $SUCC Domain directory has been deleted directory
     */
    private const SUCC          = 'Domain directory %s has been deleted successfully';
    
    /**
     * @return string
     */
    public static function DEF_DIR(): string
    {
        return (new DeleteDDDConsts(self::DEF_DIR))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function INFO(): string
    {
        return (new DeleteDDDConsts(self::INFO))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function DEL_QUEST(): string
    {
        return (new DeleteDDDConsts(self::DEL_QUEST))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function DESC(): string
    {
        return (new DeleteDDDConsts(self::DESC))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function NAME_DESC(): string
    {
        return (new DeleteDDDConsts(self::NAME_DESC))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function SUCC(): string
    {
        return (new DeleteDDDConsts(self::SUCC))
            ->getValue();
    }
}
