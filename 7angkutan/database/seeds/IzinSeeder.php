<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class IzinSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        Model::unguard();
        DB::table('izin')->delete();

        DB::table('izin')->insert([
            [
                'id' => 1,
                'tanggal_pengajuan' => date('Y-m-d'),
                'status_pembayaran' => 0,
                'pengguna_id' => 1,
                'jenisizin_id' => 1,
                'nama_perusahaan' => 'Kobanter',
                'alamat_perusahaan' => 'Jalan Sadang Serang 10 Bandung',
                'alamat_garasi' => 'Jalan Sadang Serang 10 Bandung',
                'npwp' => '1234567891011',
                'tanggal_perpanjangan' => null,
                'spam' => 0,
            ],
            [
                'id' => 2,
                'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 * (365 * 5)),
                'status_pembayaran' => 1,
                'pengguna_id' => 1,
                'jenisizin_id' => 1,
                'nama_perusahaan' => 'Kobanter',
                'alamat_perusahaan' => 'Jalan Sadang Serang 10 Bandung',
                'alamat_garasi' => 'Jalan Sadang Serang 10 Bandung',
                'npwp' => '1234567891011',
                'tanggal_perpanjangan' => date('Y-m-d'),
                'spam' => 0
            ],
            [
        'id' => 3,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 2),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 1,
        'nama_perusahaan' => 'PT. Macan Kuning',
        'alamat_perusahaan' => 'Jalan Perintis Kemerdekaan No 34',
        'alamat_garasi' => 'Jalan Perintis Kemerdekaan No 34',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ],
[
        'id' => 4,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 0),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 2,
        'nama_perusahaan' => 'PT. Kijang Putih',
        'alamat_perusahaan' => 'Jalan Dubai No 500',
        'alamat_garasi' => 'Jalan Dubai No 500',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ],
[
        'id' => 5,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 2),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 1,
        'nama_perusahaan' => 'PT. Macan Kuning',
        'alamat_perusahaan' => 'Jalan Perintis Kemerdekaan No 34',
        'alamat_garasi' => 'Jalan Perintis Kemerdekaan No 34',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ],
[
        'id' => 6,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 1),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 1,
        'nama_perusahaan' => 'PT. Kijang Putih',
        'alamat_perusahaan' => 'Jalan Dubai No 500',
        'alamat_garasi' => 'Jalan Dubai No 500',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ],
[
        'id' => 7,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 2),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 1,
        'nama_perusahaan' => 'PT. Kijang Putih',
        'alamat_perusahaan' => 'Jalan Dubai No 500',
        'alamat_garasi' => 'Jalan Dubai No 500',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ],
[
        'id' => 8,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 1),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 2,
        'nama_perusahaan' => 'PT. Burung Biru',
        'alamat_perusahaan' => 'Jalan Semarang No 30',
        'alamat_garasi' => 'Jalan Semarang No 30',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ],
[
        'id' => 9,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 1),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 2,
        'nama_perusahaan' => 'PT. Kijang Putih',
        'alamat_perusahaan' => 'Jalan Dubai No 500',
        'alamat_garasi' => 'Jalan Dubai No 500',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ],
[
        'id' => 10,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 0),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 1,
        'nama_perusahaan' => 'PT. Kijang Putih',
        'alamat_perusahaan' => 'Jalan Dubai No 500',
        'alamat_garasi' => 'Jalan Dubai No 500',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ],
[
        'id' => 11,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 2),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 2,
        'nama_perusahaan' => 'PT. Macan Kuning',
        'alamat_perusahaan' => 'Jalan Perintis Kemerdekaan No 34',
        'alamat_garasi' => 'Jalan Perintis Kemerdekaan No 34',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ],
[
        'id' => 12,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 2),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 2,
        'nama_perusahaan' => 'PT. Keluarga Besar',
        'alamat_perusahaan' => 'Jalan Laksana No 33',
        'alamat_garasi' => 'Jalan Laksana No 33',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ],
[
        'id' => 13,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 2),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 2,
        'nama_perusahaan' => 'PT. Kijang Putih',
        'alamat_perusahaan' => 'Jalan Dubai No 500',
        'alamat_garasi' => 'Jalan Dubai No 500',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ],
[
        'id' => 14,
        'tanggal_pengajuan' => date('Y-m-d',time() - 3600 * 24 *30 * 0),
        'status_pembayaran' => 0,
        'pengguna_id' => 1,
        'jenisizin_id' => 1,
        'nama_perusahaan' => 'PT. Burung Biru',
        'alamat_perusahaan' => 'Jalan Semarang No 30',
        'alamat_garasi' => 'Jalan Semarang No 30',
        'npwp' => '1234567891011',
        'tanggal_perpanjangan' => null,
        'spam' => 0
    ]
        ]);
        
    }

}