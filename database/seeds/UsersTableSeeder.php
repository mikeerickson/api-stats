<?php

use Illuminate\Database\Seeder;
use App\User;
use Colors\Color;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$num_rows = 25;
    	$c = new Color;

		User::truncate();

		User::create([
			'name'     => 'Mike Erickson',
			'email'    => 'mike.erickson@mac.com',
			'password' => bcrypt('mkjbbtrsh10')
		]);

		$faker = Faker\Factory::create();

		for($i = 0; $i < $num_rows; $i++) {
			User::create([
				'name' => $faker->userName,
				'email' => $faker->email,
				'password' => bcrypt('password'),
			]);
		}

		echo $c("==> Seeded " . ($num_rows + 1) . " Users\n")->green();


	}
}
