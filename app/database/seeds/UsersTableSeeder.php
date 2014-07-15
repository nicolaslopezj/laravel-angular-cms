<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$data = [
		'name' => 'Nicolás López',
		'email' => 'nicolaslopezj@me.com',
		'role' => 'dev',
		'password' => '$2y$10$xyRINiLgWZwKdcie9/bwgOfd4frPpIGVgNhQBK3oXmPsWv69Y8pOO',
		];

		User::create($data);

	}

}
