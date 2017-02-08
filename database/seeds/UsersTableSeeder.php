<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		User::create([
			'name'     => 'Mike Erickson',
			'email'    => 'codedungeon@gmail.com',
			'password' => bcrypt('mkjbbtrsh10')
		]);

		$faker = Faker\Factory::create();

		for($i = 0; $i < 25; $i++) {
			User::create([
				'name' => $faker->userName,
				'email' => $faker->email,
				'password' => bcrypt('password'),
			]);
		}

	}
}
