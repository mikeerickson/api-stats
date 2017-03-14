<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class APIToken extends Model
{
    protected $table = 'api_tokens';

    protected $fillable = ['name','email'];
    
    public function setTokenAttribute($value)
    {
        $this->attributes['token'] = $value;
    }

    public function createToken()
    {
        return Faker::create()->uuid;
    }
}
