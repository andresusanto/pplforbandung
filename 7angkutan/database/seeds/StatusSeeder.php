<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StatusSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->delete();

        DB::table('status')->insert([
            ['id'=>1, 'nama'=>'Melengkapi dokumen','keterangan'=> 'Pemohon izin diwajibkan melengkapi dokumen-dokumen yang dibutuhkan'],
            ['id'=>2, 'nama'=>'Pemeriksaan lapangan','keterangan'=> 'Kami akan melakukan pemeriksaan terkait kendaraan dan kondisi lapangan.'],
            ['id'=>3, 'nama'=>'Izin ditolak','keterangan'=> 'Izin anda bermasalah. Anda tidak memenuhi persyaratan'],
            ['id'=>4, 'nama'=>'Penyerahan SKRD','keterangan'=> 'Mohon serahkan bukti pembayaran SKRD dengan biaya sesuai ketetapan yang dicantumkan'],
            ['id'=>5, 'nama'=>'Izin diterima','keterangan'=> 'Izin sudah diterbitkan. Silakan mengambil izin di kantor.'],
            ['id'=>6, 'nama'=>'Pengajuan izin dibatalkan','keterangan'=>'Izin ini dibatalkan oleh pemohon']
        ]);
    }

}