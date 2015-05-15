<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class JenisIzinSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('jenisizin')->delete();
        DB::table('jenisizin')->insert([
            ['id' => 1 , 'nama' => 'Izin Usaha Angkutan Umum'],
            ['id' => 2 , 'nama' => 'Izin Usaha Taksi']
        ]);

    }

}
