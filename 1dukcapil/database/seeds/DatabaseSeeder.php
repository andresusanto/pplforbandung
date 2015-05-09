<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		\App\Admin::create(['username' => 'admin', 'password'=> bcrypt('admin'), 'name' => 'Dinas Kependudukan']);
	}

}
