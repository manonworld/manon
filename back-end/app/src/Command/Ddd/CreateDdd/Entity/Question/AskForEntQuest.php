<?php

namespace App\Command\Ddd\CreateDdd\Entity\Question;

use Symfony\Component\Console\Question\ConfirmationQuestion;
use App\Command\Ddd\CreateDdd\CreateDDDConsts;

class AskForEntQuest {

    public static function ask(): ConfirmationQuestion {

        return new ConfirmationQuestion( CreateDDDConsts::ENT_QUEST(), false );
    }

}