<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pitching extends Model
{
    protected $table = 'pitching';

    public function player()
    {
        return $this->hasOne(Player::class, 'playerID', 'playerID');
    }
}
