<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration {

	// Schema::create('jadwal',function(Blueprint $table)
 //        {
 //            $table->increments('id');
 //            $table->integer('asal_pool_id')->unsigned();
 //            $table->foreign('asal_pool_id')->references('id')->on('pool')->onDelete('cascade');
 //            $table->integer('tujuan_pool_id')->unsigned();
 //            $table->foreign('tujuan_pool_id')->references('id')->on('pool')->onDelete('cascade');
 //            $table->date('tanggal');
 //            $table->time('waktu');
 //            $table->integer('harga');
 //            $table->tinyInteger('aktif');
 //            $table->tinyInteger('promo');
 //        });
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//urutan jangan diubah
		//amasalah integrity constraint
		$this->createTablePengguna();
		$this->createTableStatus();
		$this->createTableTerminal();
		$this->createTableTemplate();
		$this->createTableJenisIzin();
		$this->createTableIzin();
		$this->createTableAngkutan();
		$this->createTableDokumen();

		$this->createTableStatusIzin();
		$this->createTableTemplateIzin();
		$this->createTableTerminalAngkutan();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('terminal_angkutan');
		Schema::drop('template_izin');
		Schema::drop('status_izin');
		Schema::drop('dokumen');
		Schema::drop('anguktan');
		Schema::drop('izin');
		Schema::drop('jenisizin');
		Schema::drop('template');
		Schema::drop('terminal');
		Schema::drop('status');
		Schema::drop('penguna');
	}

	protected function createTableAngkutan(){
		Schema::create('angkutan',function(Blueprint $table){
			$table->increments('id');
			$table->string('nama',100);
			$table->integer('no_kendaraan');
			$table->integer('izin_id')->unsigned();

			
			$table->foreign('izin_id')->references('id')->on('izin')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	protected function createTableDokumen(){
		Schema::create('dokumen',function(Blueprint $table){
			$table->increments('id');
			$table->string('nama',50);
			$table->string('url',100);
			$table->integer('izin_id')->unsigned();
			$table->integer('template_id')->unsigned();
			$table->tinyInteger('status')->default(1);

			
			$table->foreign('izin_id')->references('id')->on('izin')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('template_id')->references('id')->on('template')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	protected function createTableIzin(){
		Schema::create('izin',function(Blueprint $table){
			$table->increments('id');
			$table->date('tanggal_pengajuan');
			$table->text('deskripsi');
			$table->tinyInteger('status_pembayaran')->default(0);
			$table->integer('pengguna_id')->unsigned();
			$table->integer('jenisizin_id')->unsigned();
			$table->integer('biaya')->nullable();
			$table->tinyInteger('updated_by_pengguna')->default(0);
			$table->tinyInteger('updated_by_admin')->default(0);

			
			$table->foreign('jenisizin_id')->references('id')->on('jenisizin')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('pengguna_id')->references('id')->on('pengguna')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	protected function createTableJenisIzin(){
		Schema::create('jenisizin',function(Blueprint $table){
			$table->increments('id');
			$table->string('nama',50);

			
		});
	}

	protected function createTablePengguna(){
		Schema::create('pengguna',function(Blueprint $table){
			$table->increments('id');
			$table->string('email',50);
			$table->string('password',50);
			$table->string('nama',50);
			$table->string('alamat',50);
			$table->string('no_ktp',50);
			$table->tinyInteger('is_admin');

			
		});
	}

	protected function createTableStatus(){
		Schema::create('status',function(Blueprint $table){
			$table->increments('id');
			$table->string('nama',50);
			$table->text('keterangan');

			
		});
	}

	protected function createTableStatusIzin(){
		Schema::create('status_izin',function(Blueprint $table){
			$table->increments('id');
			$table->integer('izin_id')->unsigned();
			$table->integer('status_id')->unsigned();
			$table->datetime('timestamp');

			$table->foreign('izin_id')->references('id')->on('izin')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('status_id')->references('id')->on('status')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	protected function createTableTemplate(){
		Schema::create('template',function(Blueprint $table){
			$table->increments('id');
			$table->string('nama',200);
			$table->string('url',100)->nullable();

			
		});
	}

	protected function createTableTemplateIzin(){
		Schema::create('template_izin',function(Blueprint $table){
			$table->integer('jenisizin_id')->unsigned();
			$table->integer('template_id')->unsigned();

			$table->foreign('jenisizin_id')->references('id')->on('jenisizin')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('template_id')->references('id')->on('template')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	protected function createTableTerminal(){
		Schema::create('terminal',function(Blueprint $table){
			$table->increments('id');
			$table->string('nama',50);
			$table->text('alamat');

			
		});
	}

	protected function createTableTerminalAngkutan(){
		Schema::create('terminal_angkutan',function(Blueprint $table){
			$table->integer('angkutan_id')->unsigned();
			$table->integer('terminal_id')->unsigned();

			$table->foreign('angkutan_id')->references('id')->on('angkutan')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('terminal_id')->references('id')->on('terminal')->onDelete('cascade')->onUpdate('cascade');
		});
	}

}
