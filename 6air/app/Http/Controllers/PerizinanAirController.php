<?php
namespace App\Http\Controllers;

class PerizinanAirController extends Controller {


	public function validasiInput(){
	
	}

	public function __construct()
	{
		//$this->middleware('auth');
	}
	
	public function getNewperizinan()
	{
		return view('home');
	}
	
	
	public function postNewperizinan()
	{
		return view('home');
	}
	
	public function perpanjangperizinan($id)
	{
		return view('home');
	}
	
	public function postPerpanjangperizinan()
	{
		return view('home');
	}
	
	public function ubahperizinan($id)
	{
		return view('home');
	}
	
	public function postUbahperizinan()
	{
		return view('home');
	}
	
	
	public function getIndex()
	{
		return view('home');
	}

	public function detilperizinan($id){
		return $id;
	}
	
	public function ubahstatus($id, $status){
		return $id . ' ' . $status;
	}
	
	public function IndexDinas()
	{
		
	}
	
	public function IndexUser()
	{
		
	}
}
