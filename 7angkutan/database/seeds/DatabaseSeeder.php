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

		$this->call('PenggunaSeeder');
		$this->command->info('Pengguna ditambahkan');
		$this->call('StatusSeeder');
		$this->command->info('Status ditambahkan');
		$this->call('TemplateSeeder');
		$this->command->info('Template ditambahkan');
		$this->call('JenisIzinSeeder');
		$this->command->info('Jenis Izin ditambahkan');
		$this->call('TemplateIzinSeeder');
		$this->command->info('Template Izin ditambahkan');
		$this->call('IzinSeeder');
		$this->command->info('Izin ditambahkan');
		$this->call('DokumenSeeder');
		$this->command->info('Dokumen ditambahkan');
	}

}
