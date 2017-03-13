<?php

require 'app/traits/ApiTrait.php';

use App\Traits\ApiTrait;

class Thread
{
    use ApiTrait;

    protected $rules;

    public function __construct()
    {
        $this->rules = $this->getBaseRules();
        var_dump($this->rules);
    }
}

$batting = new Thread();
