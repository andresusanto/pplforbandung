<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');

		$penduduk = \App\Penduduk::create([
            'nama' => 'Rosyita Eka Putri Sari',
            'kewarganegaraan' => 'Warga Negara Indonesia',
            'jenisKelamin' => 'P',
            'tempatLahir' => 'Sleman',
            'waktuLahir' => \Carbon\Carbon::now(),
            'golonganDarah' => 'O',
            'pekerjaan' => 'Olahragawan',
        ]);
        \App\KartuTandaPenduduk::create([
            'id' => '1221064502790001',
            'idPenduduk' => $penduduk->id,
            'waktuBerlaku' => \Carbon\Carbon::now(),
            'waktuCetak' => \Carbon\Carbon::now(),
        ]);
        \App\User::create([
            'email' => 'putri@gmail.com',
            'password' => Hash::make('putriputri'),
            'id_penduduk' => $penduduk->id,
        ]);

        DB::table('oauth_scopes')->delete();

        $datetime = \Carbon\Carbon::now();

        $scopes = [
            [
                'id' => 'scope1',
                'description' => 'Scope 1 Description',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
            [
                'id' => 'scope2',
                'description' => 'Scope 2 Description',
                'created_at' => $datetime,
                'updated_at' => $datetime,
            ],
        ];

        DB::table('oauth_scopes')->insert($scopes);

        // DB::table('oauth_client_scopes')->delete();

        // $clientScopes = [
        //     [
        //         'client_id' => 'client1id',
        //         'scope_id' => 'scope1',
        //         'created_at' => $datetime,
        //         'updated_at' => $datetime,
        //     ],
        //     [
        //         'client_id' => 'client2id',
        //         'scope_id' => 'scope2',
        //         'created_at' => $datetime,
        //         'updated_at' => $datetime,
        //     ],
        // ];

        // DB::table('oauth_client_scopes')->insert($clientScopes);
	}

}
