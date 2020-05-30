<?php

namespace App\Command\Ddd\CreateDdd\Repo\Question;

use Symfony\Component\Console\Question\ConfirmationQuestion;
use App\Command\Ddd\CreateDdd\CreateDDDConsts;

class AskForRepoQuest
{

    public static function ask(): ConfirmationQuestion
    {

        return new ConfirmationQuestion(CreateDDDConsts::REPO_QUEST(), false);
    }
}
