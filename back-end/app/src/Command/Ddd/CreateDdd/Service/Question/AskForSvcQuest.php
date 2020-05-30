<?php

namespace App\Command\Ddd\CreateDdd\Service\Question;

use Symfony\Component\Console\Question\ConfirmationQuestion;
use App\Command\Ddd\CreateDdd\CreateDDDConsts;

class AskForSvcQuest
{

    public static function ask(): ConfirmationQuestion
    {

        return new ConfirmationQuestion(CreateDDDConsts::SVC_QUEST(), false);
    }
}
