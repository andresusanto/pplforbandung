<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class IzinController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function user()
	{
        $name = 'usaha_sarana';
        $redirect_uri = 'http://usahasarana.pplbandung.biz.tm/login_callback';
        $client_id = '0XiZ8LzQTmO9lEnt';
        $client_secret = 'E8wMZsM3AJdWATl2';
        $login = 'http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id=0XiZ8LzQTmO9lEnt&redirect_uri=http://usahasarana.pplbandung.biz.tm/login_callback&response_type=code';

        //test ke localhost
        $name_local = 'saranaperdaganganlocalhost';
        $client_id_local = 'ulP9hlsW74ahy2ND';
        $redirect_uri_local = 'http://localhost:8000/login_callback';
        $client_secret_local = 'JDPqeCpwEFUY6F4Q';
        $login_local = 'http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id=ulP9hlsW74ahy2ND&redirect_uri=http://localhost:8000/login_callback&response_type=code';

        return view('izin.user.index');
	}

	public function admin()
	{
		return view('izin.admin.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

    public function download($filename)
    {
        if (file_exists($filename))
        {
            // Send Download
            return Response::download($filename, basename($filename), [
                'Content-Length: '. filesize($filename)
            ]);
        }
        else
        {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }

    public function deleteIzin($id, $jenisizin)
    {
        DB::table('izin')->where('id',$id)->delete();
        switch($jenisizin)
        {
            case 'IUTM':
            {
                return redirect()->route('IUTM');
                break;
            }
            case 'IUPP':
            {
                return redirect()->route('IUPP');
                break;
            }
            case 'IUPT':
            {
                return redirect()->route('IUPT');
                break;
            }
            case 'ITPMB':
            {
                return redirect()->route('ITPMB');
                break;
            }
            case 'STPW':
            {
                return redirect()->route('STPW');
                break;
            }
        }
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
