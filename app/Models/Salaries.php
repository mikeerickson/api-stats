<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{
    protected $table = 'salaries';

    public function player()
    {
        return $this->hasOne(Player::class, 'playerID', 'playerID');
    }
}
#!/usr/bin/env bash
