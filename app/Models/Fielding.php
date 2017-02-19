<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fielding extends Model
{
    protected $table = 'fielding';

    public function player()
    {
        return $this->hasOne(Player::class, 'playerID', 'playerID');
    }
}
