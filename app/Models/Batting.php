<?php

namespace App\Models;

use Validator;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ApiTrait;

class Batting extends Model
{
    use ApiTrait;

    protected $table = 'batting';

    protected $hidden = ['stint','created_at','updated_at'];

    protected $rules;

    protected $messages;
    
    public function __construct()
    {
        $this->rules    = $this->getBaseRules();
        $this->messages = $this->getBaseMessages();

        $this->rules = array_merge([
            'G' => 'required'
        ], $this->rules);

        $this->messages = array_merge([
            'G.required' => 'Please supply games played [ `G` field ].'
        ], $this->messages);
    }

    public function validate($data)
    {
        return Validator::make($data, $this->rules, $this->messages);
    }

    public function player()
    {
        return $this->hasOne(Player::class, 'playerID', 'playerID');
    }
}
