<?php

use App\Models\APIToken;
use Carbon\Carbon;
use Colors\Color;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class APITokensTableSeeder extends Seeder {

	public function run()
	{
		$faker   = Faker::create();
		$numRows = 9;
		$c       = new Color;

		APIToken::truncate();

		// create the first 'admin' user and rest will be random values
		APIToken::Create([
			'user_name' => 'Mike Erickson',
			'token'     => 'mkjbbtrsh10',
			'email'     => 'mike.erickson@mac.com',
			'active'    => true,
			'expires'   => Carbon::now()->addWeeks(52)
		]);

		// create expired token
		APIToken::Create([
			'user_name' => 'Mike Erickson',
			'token' => 'expired',
			'email' => 'expired@domain.com',
			'active' => false,
			'expires' => Carbon::now()
		]);

		foreach (range(1, $numRows) as $index) {
			APIToken::Create([
				'user_name' => $faker->name,
				'token'     => $faker->uuid,
				'email'     => $faker->email,
				'active'    => true,
				'expires'   => Carbon::now()->addWeeks(52)
			]);
		}

		echo $c("==> Seeded " . ($numRows + 2) . " API Tokens\n")->green();

	}
}