<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PenggunaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengguna')->delete();

        DB::table('pengguna')->insert([
            ['id'=>'1','password'=>'kevin','nama'=>'Kevin Yudi Utama','alamat'=>'Ciumbuleuit','no_ktp'=>'1042301403195435','email'=>'yafithekid212@gmail.com','is_admin'=>0],
            ['id'=>'2','password'=>'admin','nama'=>'Agirato','alamat'=>'Plesiran','no_ktp'=>'5633850071023425','email'=>'admin@gmail.com','is_admin'=>1],
            ['id'=>'3','password'=>'agi','nama'=>'Gifari Kautsar','alamat'=>'Bandung','no_ktp'=>'5591689044787647','email'=>'gifarikautsar@gmail.com','is_admin'=>0],
            ['id'=>'4','password'=>'lontong','nama'=>'Lontong Sate','alamat'=>'Bandung','no_ktp'=>'1670861006608387','email'=>'lontong@gmail.com','is_admin'=>0],
        ]);
    }

}