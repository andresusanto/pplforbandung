<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Bus;

use App\Commands\RequestAccessToken;
use App\Commands\RequestCurrentUser;
use App\Models\Pengguna;
use Auth;

class OAuthController extends Controller {

	public function __construct(){
		$this->middleware('auth',['except'=>['getRequestAccessToken','doAuthorization','getAfterAuthorized']]);
	}

    //cara kerja
    //[any auth needed page] -> doauthorization -> getauthorized-> getrequestaccesstoken -> getauthenticated

    public function getRequestAccessToken()
    {
        $response = Bus::dispatch(
            new RequestAccessToken(Pengguna::getClientId(),Pengguna::getClientSecret(),Pengguna::getRedirectURI(),Pengguna::getAuthorizationCode())
        );
        if (isset($response['access_token'])){
            print($response['access_token']);
            Pengguna::setAccessToken($response['access_token']);
            return redirect()->route('oauth.authenticated');



        } else {
            dd($response);
            exit();
        }
    }

    public function doAuthorization()
    {
        return redirect()->to('http://dukcapil.pplbandung.biz.tm/oauth/authorize?client_id='.Pengguna::getClientId().'&redirect_uri='.Pengguna::getRedirectURI().'&response_type=code');
    }

    public function getAfterAuthorized()
    {
        $auth_code = Request::input('code');
        Pengguna::setAuthorizationCode($auth_code);
        return redirect()->route('oauth.request_access_token');
    }

	public function getAuthenticated()
	{
        //register user
        $user_json = Bus::dispatch(new RequestCurrentUser(Pengguna::getAccessToken()));
        if (isset($user_json)){
            $user = Pengguna::where('no_ktp','=',$user_json['id'])->first();
            if ($user === null) $user = new Pengguna();

            $user->nama = $user_json['nama_penduduk'];
            $user->alamat = $user_json['alamat_penduduk'];
            $user->save();
            Auth::login($user);
            $access_token = Pengguna::getAccessToken();
            return redirect()->route('izin.pengguna.index');
            //return view('oauth.authenticated',compact('access_token'));
        } else {
            dd($user_json);
            die();
        }
		
	}

}
