<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class APIToken extends Model
{
	protected $table = 'api_tokens';

	public function setTokenAttribute()
	{
		$this->attributes['token'] = $this->createToken();
	}

	public function createToken()
	{
		return Faker::create()->uuid;
	}

}
