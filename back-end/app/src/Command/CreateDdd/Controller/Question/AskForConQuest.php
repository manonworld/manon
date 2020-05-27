<?php

namespace App\Command\CreateDdd\Controller\Question;

use Symfony\Component\Console\Question\ConfirmationQuestion;
use App\Command\CreateDdd\CreateDDDConsts;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AskForConQuest {

    public static function ask(
        InputInterface $input,
        OutputInterface $output
    ): ConfirmationQuestion {

        return new ConfirmationQuestion( CreateDDDConsts::CON_QUEST(), false );
    }

}