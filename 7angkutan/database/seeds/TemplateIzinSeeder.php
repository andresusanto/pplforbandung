<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TemplateIzinSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $izin_angkot = 1;
        $izin_taksi = 2;
        DB::table('template_izin')->delete();

        DB::table('template_izin')->insert([
            ['jenisizin_id'=>$izin_angkot,'template_id'=>1],
            ['jenisizin_id'=>$izin_angkot,'template_id'=>2],
            ['jenisizin_id'=>$izin_angkot,'template_id'=>3],
            ['jenisizin_id'=>$izin_angkot,'template_id'=>4],
            ['jenisizin_id'=>$izin_angkot,'template_id'=>5],
            ['jenisizin_id'=>$izin_angkot,'template_id'=>6],
            ['jenisizin_id'=>$izin_angkot,'template_id'=>7],
            ['jenisizin_id'=>$izin_angkot,'template_id'=>8],
            ['jenisizin_id'=>$izin_angkot,'template_id'=>11],

            ['jenisizin_id'=>$izin_taksi,'template_id'=>1],
            ['jenisizin_id'=>$izin_taksi,'template_id'=>2],
            ['jenisizin_id'=>$izin_taksi,'template_id'=>3],
            ['jenisizin_id'=>$izin_taksi,'template_id'=>4],
            ['jenisizin_id'=>$izin_taksi,'template_id'=>5],
            ['jenisizin_id'=>$izin_taksi,'template_id'=>6],
            ['jenisizin_id'=>$izin_taksi,'template_id'=>11]
        ]);
        

    }

}
