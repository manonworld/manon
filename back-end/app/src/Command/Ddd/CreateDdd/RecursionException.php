<?php

namespace App\Command\Ddd\CreateDdd;

class RecursionException extends \Exception
{

    public function __construct(\Exception $e)
    {
        parent::__construct($e->getMessage(), 500, $e);
    }
}
