<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')->delete();
		App\User::create([
			'name' => 'manager',
			'email' => 'manager@gmail.com',
			'password' => bcrypt('123'),
		]);
		App\User::create([
			'name' => 'moderator',
			'email' => 'moderator@gmail.com',
			'password' => bcrypt('123'),
		]);
	}
}
