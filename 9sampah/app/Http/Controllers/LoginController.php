<?php 
namespace App\Http\Controllers;
use DB;
use Session;
use Input;
use App\Quotation;

class LoginController extends Controller {
	public function login(){
		$username = Input::get('username');
		$password = Input::get('password');
		
		$user = DB::table('Petugas')->where('username',$username)->first();
		if($user != NULL){
			if( $user->password == $password){
				Session::put('username',$user->username);
				Session::put('pekerjaan',$user->pekerjaan);
				Session::put('name',$user->nama);
				if($user->pekerjaan == 'Admin'){
					return redirect('admin');
				}
				else if($user->pekerjaan == 'Petugas'){
					return redirect('petugas');
				}
				else if($user->pekerjaan == 'Dinas'){
					return redirect('dinas');
				}
			}else{
				Session::put('notification','Password yang Anda masukkan salah');
				return redirect('index');
			}
		}else{
			Session::put('notification','Informasi yang Anda berikan tidak ada dalam database');
			return redirect('index');
		}
	}

	public function logout(){
		Session::flush();
		return redirect('index');
	}
}
