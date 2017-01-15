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
			'email' => config('constants.MANAGER_EMAIL'),
			'password' => bcrypt('123456'),
		]);
		App\User::create([
			'name' => 'moderator',
			'email' => config('constants.MODERATOR_EMAIL'),
			'password' => bcrypt('123456'),
		]);
	}
}
