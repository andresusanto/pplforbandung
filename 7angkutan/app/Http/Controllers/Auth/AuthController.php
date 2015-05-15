<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Request;
use App\Models\Pengguna;

class AuthController extends Controller {

	public function __construct()
	{
	}


	public function getLogin($is_admin = false)
	{
		return view('auth.login',['is_admin'=>$is_admin,'email'=>'','error'=>'']);
	}

	public function getLogout()
	{
		Auth::logout();
		return redirect()->route('landing_page');
	}

	public function postLogin()
	{
		$email = Request::input('email');
		$password = Request::input('password');
		//cari username di database
		$pengguna = Pengguna::where('email','=',$email)->where('password','=',$password)->first();
		if ($pengguna == null){
			return view('auth.login',['email'=>$email,'error'=>'Invalid email/password']);
		} else {
			Auth::login($pengguna);
			if ($pengguna->is_admin){
				return redirect()->route('izin.admin.index');
			} else {
				return redirect()->route('izin.pengguna.index');
			}
		}
	}

}
