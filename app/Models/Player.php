<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';

    protected $hidden = ['retroID','bbrefID', 'deathYear','deathMonth','deathDay','deathCountry','deathCity','deathState','finalGame'];

    public function batters()
    {
        return $this->belongsTo(Batting::class, 'playerID', 'playerID');
    }

    public function pitchers()
    {
        return $this->belongsTo(Pitching::class, 'playerID', 'playerID');
    }
}
