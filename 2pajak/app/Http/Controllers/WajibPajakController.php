<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\WajibPajak;
use Illuminate\Http\Request;

class WajibPajakController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$wajibPajak = WajibPajak::all();
        return $wajibPajak;
	}

    public function register(){
        $wajibpajak = new WajibPajak;
        $arr=SSOData::GetDataPenduduk();
        if (get_class($redir = (object) $arr) === 'Illuminate\Http\RedirectResponse'){
            return $redir;
        }
        $wajibpajak->nama = $arr['Nama'];
        $wajibpajak->tempat_lahir = $arr['Tempat Lahir'];
        $wajibpajak->tanggal_lahir = new Date($arr['Tgl Lahir']);
        $wajibpajak->alamat = $arr['Alamat'];
        $wajibpajak->save();
        return redirect::to('/wp/home');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
