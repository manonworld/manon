<?php

namespace App\Command\Ddd\CreateDdd\Controller\Question;

use Symfony\Component\Console\Question\ConfirmationQuestion;
use App\Command\Ddd\CreateDdd\CreateDDDConsts;

class AskForConQuest {

    public static function ask(): ConfirmationQuestion {

        return new ConfirmationQuestion( CreateDDDConsts::CON_QUEST(), false );
    }

}