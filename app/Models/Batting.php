<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batting extends Model
{
    protected $table = 'batting';

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
