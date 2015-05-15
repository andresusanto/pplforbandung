<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TemplateSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('template')->delete();

        DB::table('template')->insert([
            ['id'=>1, 'nama'=>'Fotocopy Surat Izin Tempat Usaha (SITU)', 'url'=>'uploads/templates/1.pdf','butuh_perpanjangan'=>1,'butuh_upload'=>1,'keterangan'=>''],
            ['id'=>2, 'nama'=>'Fotocopy KTP Pemohon', 'url'=>NULL,'butuh_perpanjangan'=>0,'butuh_upload'=>0,'keterangan'=>'Data akan diambil dari dukcapil'],
            ['id'=>3, 'nama'=>'Fotokopi NPWP', 'url'=>NULL,'butuh_perpanjangan'=>0,'butuh_upload'=>0,'keterangan'=>'Data akan diambil dari sistem pajak'],
            ['id'=>4, 'nama'=>'Surat Permohonan Izin Usaha Angkutan', 'url'=>'uploads/templates/4.pdf','butuh_perpanjangan'=>1,'butuh_upload'=>1,'keterangan'=>''],
            ['id'=>5, 'nama'=>'Surat Izin Usaha Perdagangan', 'url'=>'uploads/templates/5.pdf','butuh_perpanjangan'=>1,'butuh_upload'=>1,'keterangan'=>''],
            ['id'=>6, 'nama'=>'Foto Garasi/Tempat Penyimpanan Kendaraan', 'url'=>NULL,'butuh_perpanjangan'=>1,'butuh_upload'=>1,'keterangan'=>''],
            ['id'=>7, 'nama'=>'Fotocopy SK Izin Trayek', 'url'=>NULL,'butuh_perpanjangan'=>1,'butuh_upload'=>1,'keterangan'=>''],
            ['id'=>8, 'nama'=>'Surat Pernyataan Tidak Melakukan Pengeteman dengan Materai Rp6000', 'url'=>NULL,'butuh_perpanjangan'=>0,'butuh_upload'=>1,'keterangan'=>''],
            ['id'=>9, 'nama'=>'Fotocopy Buku Uji', 'url'=>NULL,'butuh_perpanjangan'=>1,'butuh_upload'=>1,'keterangan'=>''],
            ['id'=>10, 'nama'=>'Fotocopy STNK', 'url'=>NULL,'butuh_perpanjangan'=>1,'butuh_upload'=>1,'keterangan'=>''],
            ['id'=>11, 'nama'=>'Surat Pernyataan tidak keberatan dari tetangga.', 'url'=>NULL,'butuh_perpanjangan'=>1,'butuh_upload'=>1,'keterangan'=>''],
            ['id'=>12, 'nama' => 'Bukti Pelunasan SKRD','url'=>NULL,'butuh_perpanjangan'=>1,'butuh_upload'=>1,'keterangan'=>'']
        ]);
    }

}