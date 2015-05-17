<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePajakTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pajak', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('npwpd');
            $table->enum('kategori',['Pajak Penghasilan','Pajak Restoran', 'Pajak Hiburan', 'Pajak Hotel', 'Pajak Bumi & Bangunan']);
            $table->integer('aset_kepemilikan');
            $table->integer('jumlah_pajak');
            $table->boolean('status_pelunasan');
            $table->date('tanggal');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('pajak');
	}

}
