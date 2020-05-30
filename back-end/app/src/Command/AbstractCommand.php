<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;

class AbstractCommand extends Command {

    protected static $defaultName = 'app:default:command';

}