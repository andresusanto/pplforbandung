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
		Schema::create('izin', function(Blueprint $table) {
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
		
		Schema::create('tandapendaftaranwaralaba', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idIzin')->unsigned()->default(0);
			$table->foreign('idIzin')->references('id')->on('izin')->onDelete('cascade');
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

		Schema::create('izintempatpenjualanminumaberalkohol', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idIzin')->unsigned()->default(0);
			$table->foreign('idIzin')->references('id')->on('izin')->onDelete('cascade');
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

        Schema::create('admin', function(Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('nama');
        });

		Schema::create('pengguna', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama');
		});

		Schema::create('izinusahapusatperbelanjaan', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idIzin')->unsigned()->default(0);
			$table->foreign('idIzin')->references('id')->on('izin')->onDelete('cascade');
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

		Schema::create('izinusahatokomodern', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idIzin')->unsigned()->default(0);
			$table->foreign('idIzin')->references('id')->on('izin')->onDelete('cascade');
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

		Schema::create('izinusahapasartradisional', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('idIzin')->unsigned()->default(0);
			$table->foreign('idIzin')->references('id')->on('izin')->onDelete('cascade');
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
		Schema::drop('tandapendaftaranwaralaba');
		Schema::drop('izintempatpenjualanminumaberalkohol');
		Schema::drop('izinusahapasartradisional');
		Schema::drop('izinusahatokomoern');
		Schema::drop('izinusahapusatperbelanjaan');
		Schema::drop('izin');
		Schema::drop('pengguna');
        Schema::drop('admin');
	}

}
