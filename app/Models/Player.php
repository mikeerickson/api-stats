<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'player';

    public function batters()
    {
        return $this->hasMany(Batting::class);
    }
}
