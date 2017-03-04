<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batting extends Model
{
    protected $table = 'batting';

    protected $hidden = ['stint'];

    public function player()
    {
        return $this->hasOne(Player::class, 'playerID', 'playerID');
    }
}
