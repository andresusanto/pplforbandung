<?php namespace App\Http\Controllers;

use Auth;
use Authorizer;
use Request;
use Response;
use App\OAuthClient;
use App\OAuthClientEndpoint;
use Illuminate\Support\Str;

class OAuthController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('check-authorization-params', array('except' => ['getAccessToken', 'getRegister', 'doRegister']));
		$this->middleware('auth', array('except' => ['getAccessToken', 'getRegister', 'doRegister']));
	}

	public function getAuthorize()  {
		return view('oauth.authorization-form', Authorizer::getAuthCodeRequestParams());
	}

	public function doAuthorize() {
		$params['user_id'] = Auth::user()->id;

		$redirectUri = '';

		// if the user has allowed the client to access its data, redirect back to the client with an auth code
		if (Request::input('approve') !== null) {
			$redirectUri = Authorizer::issueAuthCode('user', $params['user_id'], $params);
		}

		// if the user has denied the client to access its data, redirect back to the client with an error message
		if (Request::input('deny') !== null) {
			$redirectUri = Authorizer::authCodeRequestDeniedRedirectUri();
		}

		return redirect($redirectUri);
	}

	public function getAccessToken() {
		return Response::json(Authorizer::issueAccessToken());
	}

	public function getRegister() {
		return view('oauth.register');
	}

	public function doRegister() {
		$clientId = Str::random();
		$clientSecret = Str::random();
		$client = OAuthClient::create(array('id' => $clientId, 
											'secret' => $clientSecret, 
											'name' => Request::input('name')));
		OAuthClientEndpoint::create(array('client_id' => $clientId, 'redirect_uri' => Request::input('redirectUri')));
		return view('oauth.result_register', array('clientId' => $clientId, 'clientSecret' => $clientSecret, 'redirectUri' => Request::input('redirectUri')));
	}
}