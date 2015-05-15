<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dokumen;

class DokumenSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokumen')->delete();

        DB::table('dokumen')->insert([
            [
            'id'=>1,
            'nama'=>'Fotocopy Surat Izin Tempat Usaha (SITU)',
            'izin_id'=>1,
            'template_id'=>1,
            'status'=>1,
            'url' =>'uploads/dokumen/1/1.jpg'
            ],
            [
            'id'=> 2,
            'nama'=> 'Fotocopy KTP Pemohon',
            'izin_id'=>1,
            'template_id'=>2,
            'status'=>1,
            'url' =>''
            ],
            [
            'id'=> 3,
            'nama'=> 'Fotokopi NPWP',
            'izin_id'=> 1,
            'template_id'=> 3,
            'status'=> 1,
            'url' =>''
            ],
            [
            'id'=> 4,
            'nama'=> 'Surat Permohonan Izin Usaha Angkutan',
            'izin_id'=> 1,
            'template_id'=> 4,
            'status'=> 1,
            'url' =>'uploads/dokumen/1/4.jpg'
            ],
            [
            'id'=> 5,
            'nama'=> 'Surat Izin Usaha Perdagangan',
            'izin_id'=> 1,
            'template_id'=> 5,
            'status'=> 1,
            'url' =>'uploads/dokumen/1/5.jpg'
            ],
            [
            'id'=> 6,
            'nama'=> 'Foto Garasi/Tempat Penyimpanan Kendaraan',
            'izin_id'=> 1,
            'template_id'=> 6,
            'status'=> 1,
            'url' =>'uploads/dokumen/1/6.jpg'
            ],
            [
            'id'=> 7,
            'nama'=> 'Fotocopy SK Izin Trayek',
            'izin_id'=> 1,
            'template_id'=> 7,
            'status'=> 1,
            'url' =>'uploads/dokumen/1/7.jpg'
            ],
            [
            'id'=> 8,
            'nama'=> 'Surat Pernyataan Tidak Melakukan Pengeteman dengan',
            'izin_id'=> 1,
            'template_id'=> 8, 
            'status'=>  1,
            'url' =>'uploads/dokumen/1/8.jpg'
            ],
            [
            'id'=> 9,
            'nama'=> 'Surat Pernyataan tidak keberatan dari tetangga.',
            'izin_id'=> 1,
            'template_id'=> 11,
            'status'=> 1,
            'url' =>'uploads/dokumen/1/9.jpg'
            ],
            [
            'id'=>10,
            'nama'=>'Fotocopy Surat Izin Tempat Usaha (SITU)',
            'izin_id'=>2,
            'template_id'=>1,
            'status'=>Dokumen::STATUS_OK,
            'url' =>'uploads/dokumen/2/1.pdf'
            ],
            [
            'id'=> 11,
            'nama'=> 'Fotocopy KTP Pemohon',
            'izin_id'=>2,
            'template_id'=>2,
            'status'=>Dokumen::STATUS_OK,
            'url' =>'uploads/dokumen/2/2.pdf'
            ],
            [
            'id'=> 12,
            'nama'=> 'Fotokopi NPWP',
            'izin_id'=> 2,
            'template_id'=> 3,
            'status'=> Dokumen::STATUS_OK,
            'url' =>'uploads/dokumen/2/3.pdf'
            ],
            [
            'id'=> 13,
            'nama'=> 'Surat Permohonan Izin Usaha Angkutan',
            'izin_id'=> 2,
            'template_id'=> 4,
            'status'=>Dokumen::STATUS_OK,
            'url' =>'uploads/dokumen/2/4.pdf'
            ],
            [
            'id'=> 14,
            'nama'=> 'Surat Izin Usaha Perdagangan',
            'izin_id'=> 2,
            'template_id'=> 5,
            'status'=> Dokumen::STATUS_OK,
            'url' =>'uploads/dokumen/2/5.pdf'
            ],
            [
            'id'=> 15,
            'nama'=> 'Foto Garasi/Tempat Penyimpanan Kendaraan',
            'izin_id'=> 2,
            'template_id'=> 6,
            'status'=> Dokumen::STATUS_OK,
            'url' =>'uploads/dokumen/2/6.pdf'
            ],
            [
            'id'=> 16,
            'nama'=> 'Fotocopy SK Izin Trayek',
            'izin_id'=> 2,
            'template_id'=> 7,
            'status'=> Dokumen::STATUS_OK,
            'url' =>'uploads/dokumen/2/7.pdf'
            ],
            [
            'id'=> 17,
            'nama'=> 'Surat Pernyataan Tidak Melakukan Pengeteman dengan',
            'izin_id'=> 2,
            'template_id'=> 8,
            'status'=>  Dokumen::STATUS_OK,
            'url' =>'uploads/dokumen/2/8.pdf'
            ],
            [
            'id'=> 18,
            'nama'=> 'Surat Pernyataan tidak keberatan dari tetangga.',
            'izin_id'=> 2,
            'template_id'=> 11, 
            'status'=> Dokumen::STATUS_OK,
            'url' =>'uploads/dokumen/2/11.pdf'
            ],
        ]);
    }

}