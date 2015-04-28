<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabases extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Izin', function(Blueprint $table) {
			$table->increments('id');
			$table->string('NamaPemohon')->default('');
            $table->string('NamaPerusahaan')->default('');
            $table->string('AlamatPerusahaan')->default('');
			$table->string('JenisIzin',10)->default('');
			$table->date('TanggalMasuk');
			$table->date('BerlakuSampai');				
			$table->string('StatusIzin',20)->default(false);
			$table->string('DokumenPersetujuan')->default('');
			$table->timestamps();
		});
		
		Schema::create('TandaPendaftaranWaralaba', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idIzin')->unsigned()->default(0);
			$table->foreign('idIzin')->references('id')->on('Izin')->onDelete('cascade');
			$table->string('STPWPemberiWaralaba')->default('');
			$table->string('HAKI')->default('');
			$table->string('PerjanjianWaralaba')->default('');
			$table->string('IzinTeknis')->default('');
			$table->string('ProspektusPenawaranWaralaba')->default('');
			$table->string('KTPPimpinan')->default('');
			$table->string('TandaDaftarPerusahaan')->default('');
			$table->string('AktaPendirianPerusahaan')->default('');
            $table->tinyInteger('StatusAktaPendirianPerusahaan')->default(1);
		});

		Schema::create('IzinTempatPenjualanMinumanBeralkohol', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idIzin')->unsigned()->default(0);
			$table->foreign('idIzin')->references('id')->on('Izin')->onDelete('cascade');
			$table->string('IzinUsahaKepariwisataan')->default('');
			$table->string('NPWP')->default('');
            $table->tinyInteger('StatusNPWP')->default(1);
			$table->string('JenisMinumanBeralkohol')->default('');
			$table->string('KTPPimpinan')->default('');
			$table->string('AktaPendirianPerusahaan')->default('');
            $table->tinyInteger('StatusAktaPendirianPerusahaan')->default(1);
			$table->string('IzinUsahaPerdagangan')->default('');
			$table->string('TandaDaftarPerusahaan')->default('');
			$table->string('IzinGangguan')->default('');
            $table->tinyInteger('StatusIzinGangguan')->default(1);
			$table->string('KepemilikanTempat')->default('');
		});

        Schema::create('Admin', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('nama');
        });

		Schema::create('Pengguna', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama');
		});

		Schema::create('IzinUsahaPusatPerbelanjaan', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idIzin')->unsigned()->default(0);
			$table->foreign('idIzin')->references('id')->on('Izin')->onDelete('cascade');
			$table->string('PengesahanKehakiman')->default('');
			$table->string('AktaPendirianPerusahaan')->default('');
            $table->tinyInteger('StatusAktaPendirianPerusahaan')->default(1);
			$table->string('SuratKepemilikanTempat')->default('');
			$table->string('IzinGangguan')->default('');
            $table->tinyInteger('StatusIzinGangguan')->default(1);
			$table->string('PasFoto')->default('');
			$table->string('SuratPernyataanKebenaran')->default('');
			$table->string('KemitraanUMKM')->default('');
			$table->string('AnalisaDampakLingkungan')->default('');
			$table->string('SuratKeteranganLokasi')->default('');
			$table->string('KTPPimpinan')->default('');
			$table->string('NPWP')->default('');
            $table->tinyInteger('StatusNPWP')->default(1);
			$table->string('BuktiPelunasanPBB')->default('');
            $table->tinyInteger('StatusPelunasanPBB')->default(1);
			$table->string('IMB')->default('');
            $table->tinyInteger('StatusIMB')->default(1);
			$table->string('SuratIzinBKPM')->default('');
			$table->string('NeracaModalPerusahaan')->default('');
			$table->string('DomisiliPerusahaan')->default('');
		});

		Schema::create('IzinUsahaTokoModern', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idIzin')->unsigned()->default(0);
			$table->foreign('idIzin')->references('id')->on('Izin')->onDelete('cascade');
			$table->string('PengesahanKehakiman')->default('');
			$table->string('AktaPendirianPerusahaan')->default('');
            $table->tinyInteger('StatusAktaPendirianPerusahaan')->default(1);
			$table->string('SuratKepemilikanTempat')->default('');
			$table->string('IzinGangguan')->default('');
            $table->tinyInteger('StatusIzinGangguan')->default(1);
			$table->string('PasFoto')->default('');
			$table->string('SuratPernyataanKebenaran')->default('');
			$table->string('KemitraanUMKM')->default('');
			$table->string('AnalisaDampakLingkungan')->default('');
			$table->string('SuratKeteranganLokasi')->default('');
			$table->string('KTPPimpinan')->default('');
			$table->string('NPWP')->default('');
            $table->tinyInteger('StatusNPWP')->default(1);
			$table->string('BuktiPelunasanPBB')->default('');
            $table->tinyInteger('StatusPelunasanPBB')->default(1);
			$table->string('IMB')->default('');
            $table->tinyInteger('StatusIMB')->default(1);
			$table->string('SuratIzinBKPM')->default('');
			$table->string('NeracaModalPerusahaan')->default('');
			$table->string('DomisiliPerusahaan')->default('');
		});

		Schema::create('IzinUsahaPasarTradisional', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idIzin')->unsigned()->default(0);
			$table->foreign('idIzin')->references('id')->on('Izin')->onDelete('cascade');
			$table->string('PengesahanKehakiman')->default('');
			$table->string('AktaPendirianPerusahaan')->default('');
            $table->tinyInteger('StatusAktaPendirianPerusahaan')->default(1);
			$table->string('SuratKepemilikanTempat')->default('');
			$table->string('IzinGangguan')->default('');
            $table->tinyInteger('StatusIzinGangguan')->default(1);
			$table->string('PasFoto')->default('');
			$table->string('SuratPernyataanKebenaran')->default('');
			$table->string('KemitraanUMKM')->default('');
			$table->string('AnalisaDampakLingkungan')->default('');
			$table->string('SuratKeteranganLokasi')->default('');
			$table->string('KTPPimpinan')->default('');
			$table->string('NPWP')->default('');
            $table->tinyInteger('StatusNPWP')->default(1);
			$table->string('BuktiPelunasanPBB')->default('');
            $table->tinyInteger('StatusPelunasanPBB')->default(1);
			$table->string('IMB')->default('');
            $table->tinyInteger('StatusIMB')->default(1);
			$table->string('SuratIzinBKPM')->default('');
			$table->string('NeracaModalPerusahaan')->default('');
			$table->string('DomisiliPerusahaan')->default('');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('TandaPendaftaranWaralaba');
		Schema::drop('IzinTempatPenjualanMinumanBeralkohol');
		Schema::drop('IzinUsahaPasarTradisional');
		Schema::drop('IzinUsahaTokoModern');
		Schema::drop('IzinUsahaPusatPerbelanjaan');
		Schema::drop('Izin');
		Schema::drop('Pengguna');
        Schema::drop('Admin');
	}

}
