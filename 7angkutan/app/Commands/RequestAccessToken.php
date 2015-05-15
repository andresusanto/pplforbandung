<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;
use GuzzleHttp\Client;
use URL;

class RequestAccessToken extends Command implements SelfHandling {
	private $client_id;
	private $client_secret;
	private $redirect_uri;
	private $code;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($client_id,$client_secret,$redirect_uri,$code)
	{
		$this->client_id = $client_id;
		$this->client_secret  = $client_secret;
		$this->redirect_uri = $redirect_uri;
		$this->code = $code;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		try {
			$client = new Client();

			$request  = $client->createRequest('POST','http://dukcapil.pplbandung.biz.tm/oauth/access_token');
			$request->setHeader('Content-Type','application/x-www-form-urlencoded');
			
			$postBody = $request->getBody();
			$postBody->setField('grant_type','authorization_code');
			$postBody->setField('client_id',$this->client_id);
			$postBody->setField('client_secret',$this->client_secret);
			$postBody->setField('redirect_uri',$this->redirect_uri);
			
			$postBody->setField('code',$this->code);
			$response = $client->send($request);

			$json = $response->json();
			return $json;
		} catch (\GuzzleHttp\Exception\ClientException $e){
			print($e->getResponse());
		}
	}

}
