<?php

namespace App\Command\Ddd\CreateDdd\Bus\Question;

use Symfony\Component\Console\Question\ConfirmationQuestion;
use App\Command\Ddd\CreateDdd\CreateDDDConsts;

class AskForBusQuest
{

    public static function ask(): ConfirmationQuestion
    {

        return new ConfirmationQuestion(CreateDDDConsts::BUS_QUEST(), false);
    }
}
