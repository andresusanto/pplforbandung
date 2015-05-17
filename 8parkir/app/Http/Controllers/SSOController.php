<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;

use App\Permohonan;
use Request;
use Carbon\Carbon;

class SSOController extends Controller {
	function loginsso(){
		$input = Request::all();
		$code = $input['code'];;

		$client = new Client();

		$request = $client->createRequest('POST', 'http://dukcapil.pplbandung.biz.tm/oauth/access_token');
		$postBody = $request->getBody();

		// $postBody is an instance of GuzzleHttp\Post\PostBodyInterface
		
		$postBody->setField('grant_type', 'authorization_code');
		$postBody->setField('client_id', 'lD0TANrJBzIkTT1i');
		$postBody->setField('client_secret', 'QlJGoqpB9CrmyKUy');
		$postBody->setField('redirect_uri', 'http://parkir.pplbandung.biz.tm/loginsso');
		$postBody->setField('code', $code);

		echo json_encode($postBody->getFields());

		$response = $client->send($request);
		$body = json_decode($response->getBody());
		$accessToken = $body->access_token;

		$client = new Client();
		$response = $client->get('http://dukcapil.pplbandung.biz.tm/api/penduduk/',['headers'=>['Authorization' => 'Bearer '.$accessToken]]);
		$data = $response->getBody();
		$user = json_decode($data);
		#return dd($user);
		Session::set('user', $user);
		return Redirect::route('home');
	}

	function logoutsso(){
		if(Session::has('user')){
			Session::forget('user');
		}
		return Redirect::route('home');
	}
}