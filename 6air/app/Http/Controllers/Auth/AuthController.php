<?php namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/
	protected $redirectPath = '/';
	
	use AuthenticatesAndRegistersUsers;
	
	

	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	
	public function getSso()
	{
		return redirect()->guest('http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id=6nMaHHVgt8EtQ3Os&redirect_uri=http://air.pplbandung.biz.tm/auth/code&response_type=code');
	}
	
	public function getCode()
	{
		// modul OAuth
		if (Request::has('code'))
		{
			$data = array (	'grant_type' => 'authorization_code',
							'client_id' => '6nMaHHVgt8EtQ3Os',
							'client_secret' => 'QDGxTiIDsajjfmXk',
							'redirect_uri' => 'http://air.pplbandung.biz.tm/auth/code',
							'code'=> Request::input('code'));
			$data = http_build_query($data);
			$context_options = array (
								'http' => array (
									'method' => 'POST',
									'header'=> "Content-type: application/x-www-form-urlencoded\r\n"
											 . "Content-Length: " . strlen($data) . "\r\n",
									'content' => $data
									)
								);
								
			$context = stream_context_create($context_options);
			$result = file_get_contents("http://dukcapil.pplbandung.biz.tm/oauth/access_token", false, $context);
			
			$result = json_decode($result, true);
			if ($result['access_token']){
				$options = array(
					'http' => array(
						'method'  => 'GET',
						'header' => "Authorization: Bearer " . $result['access_token']  . "\r\n"
					),
				);
				$context  = stream_context_create($options);
				$result = file_get_contents("http://dukcapil.pplbandung.biz.tm/api/penduduk/", false, $context);
				$result = json_decode($result, true);
				
				if ($result['nama']){
					if (!User::find($result['id'])){
						$user = new User;
						$user->id = $result['id'];
						$user->name = $result['nama'];
						$user->save();
					}
					Auth::loginUsingId($result['id']);
					return new RedirectResponse(action('PerizinanAirController@getHomeuser'));
				}else{
					return "OAuth Failed (2)!";
				}
			}else{
				return "OAuth Failed (1)!";
			}
			//
			
		}
	}

}
