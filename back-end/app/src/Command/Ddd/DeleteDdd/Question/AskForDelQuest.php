<?php

namespace App\Command\Ddd\DeleteDdd\Question;

use Symfony\Component\Console\Question\ConfirmationQuestion;
use App\Command\Ddd\DeleteDdd\DeleteDDDConsts;

class AskForDelQuest {

    public static function ask( string $name ): ConfirmationQuestion
    {
        return new ConfirmationQuestion( sprintf( 
            DeleteDDDConsts::DEL_QUEST(), $name
        ), false );
    }

}