<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Command\CreateDdd;

use MyCLabs\Enum\Enum;

/**
 * Description of CreateDDDConsts
 *
 * @author mosta <info@manonworld.de>
 */
class CreateDDDConsts extends Enum
{
    
    private const DESC          = 'Generates a new DDD directory structure';
    private const NAME_DESC     = 'Name of the New Domain *';
    private const INFO          = 'Creating Directory Structure For The Domain: %s';
    private const SUCC          = 'You have a new domain %s';
    private const DEF_DIR       = '%s../../../%s/';
    private const DEF_BUS_DIR   = '%s../../../%s/Bus/';
    private const DEF_ENT_DIR   = '%s../../../%s/Entity';
    private const BUS_QUEST     = 'Do you want to create a bus for the new domain? ';
    private const ENT_QUEST     = 'Do you want to create an entity for the new domain? ';
    private const DEF_BUS_DIRS  = [
        'Command',
        'Envelope',
        'Event',
        'Handler',
        'Message',
        'Query',
        'Transport' => [
            'Sender',
            'Receiver',
        ],
    ];

    /**
     * @return string
     */
    public static function DESC(): string
    {
        return (new CreateDDDConsts(self::DESC))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function NAME_DESC(): string
    {
        return (new CreateDDDConsts(self::NAME_DESC))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function INFO(): string
    {
        return (new CreateDDDConsts(self::INFO))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function SUCC(): string
    {
        return (new CreateDDDConsts(self::SUCC))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function DEF_DIR(): string
    {
        return (new CreateDDDConsts(self::DEF_DIR))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function DEF_BUS_DIR(): string
    {
        return (new CreateDDDConsts(self::DEF_BUS_DIR))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function DEF_ENT_DIR(): string
    {
        return (new CreateDDDConsts(self::DEF_ENT_DIR))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function BUS_QUEST(): string
    {
        return (new CreateDDDConsts(self::BUS_QUEST))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function ENT_QUEST(): string
    {
        return (new CreateDDDConsts(self::ENT_QUEST))
            ->getValue();
    }
    
    /**
     * @return array
     */
    public static function DEF_BUS_DIRS(): array
    {
        return (new CreateDDDConsts(self::DEF_BUS_DIRS))
            ->getValue();
    }
    
}