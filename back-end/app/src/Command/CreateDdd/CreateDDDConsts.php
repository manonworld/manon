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
    private const DEF_CON_DIR   = '%s../../../%s/Controller';
    private const DEF_SVC_DIR   = '%s../../../%s/Service';
    private const DEF_REPO_DIR  = '%s../../../%s/Repository';
    private const BUS_QUEST     = 'Do you want to create bus directory for the new domain? ';
    private const ENT_QUEST     = 'Do you want to create entities directory for the new domain? ';
    private const CON_QUEST     = 'Do you want to create controllers directory for the new domain? ';
    private const SVC_QUEST     = 'Do you want to create services directory for the new domain? ';
    private const REPO_QUEST    = 'Do you want to create repositories directory for the new domain? ';
    private const NAME_ERR      = 'Invalid Domain Name';
    
    /**
     * 
     * Directory structure for the Symfony messenger bus.
     * 
     * You can go to the max depth of 256 as the standard
     * recursion max depth for PHP, or you can simply
     * adjust max recursion depth from php.ini file.
     * 
     * @var array Directory structure for the Symfony messenger bus
     */
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
    public static function NAME_ERR(): string
    {
        return (new CreateDDDConsts(self::NAME_ERR))
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
    public static function DEF_REPO_DIR(): string
    {
        return (new CreateDDDConsts(self::DEF_REPO_DIR))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function DEF_SVC_DIR(): string
    {
        return (new CreateDDDConsts(self::DEF_SVC_DIR))
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
    public static function DEF_CON_DIR(): string
    {
        return (new CreateDDDConsts(self::DEF_CON_DIR))
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
    public static function REPO_QUEST(): string
    {
        return (new CreateDDDConsts(self::REPO_QUEST))
            ->getValue();
    }
    
    /**
     * @return string
     */
    public static function SVC_QUEST(): string
    {
        return (new CreateDDDConsts(self::SVC_QUEST))
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
    
    /**
     * @return array
     */
    public static function DEF_REPO_DIRS(): array
    {
        return (new CreateDDDConsts(self::DEF_REPO_DIRS))
            ->getValue();
    }

    /**
     * @return string
     */
    public static function CON_QUEST(): string
    {
        return (new CreateDDDConsts(self::CON_QUEST))
            ->getValue();
    }
    
}
