<?php

namespace App\Command\CreateDdd\Service\Question;

use Symfony\Component\Console\Question\ConfirmationQuestion;
use App\Command\CreateDdd\CreateDDDConsts;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AskForSvcQuest {

    public static function ask(
        InputInterface $input,
        OutputInterface $output
    ): ConfirmationQuestion {

        return new ConfirmationQuestion( CreateDDDConsts::SVC_QUEST(), false );
    }

}