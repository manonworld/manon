<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

/**
 * Abstraction Layer for the Web Test Case
 *
 * @author mosta <info@manonworld.de>
 */
class AbstractWebTestCase extends WebTestCase {
    
    /**
     *
     * @var KernelBrowser $client
     */
    protected KernelBrowser $client;
    
    /**
     * 
     * New Instance
     */
    public function __construct()
    {
        parent::__construct();
        $this->client = static::createClient();
    }
    
}
