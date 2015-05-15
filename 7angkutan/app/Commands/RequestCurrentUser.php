<?php namespace App\Commands;

use App\Commands\Command;
use GuzzleHttp\Client;
use Illuminate\Contracts\Bus\SelfHandling;

class RequestCurrentUser extends Command implements SelfHandling {

	private $access_token;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($access_token)
	{
		$this->access_token = $access_token;
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
			$request  = $client->createRequest('GET','http://dukcapil.pplbandung.biz.tm/api/penduduk/');
			$request->addHeader('Authorization','Bearer '.$this->access_token);
			$response = $client->send($request);

			$json = $response->json();
			return $json;
		} catch (\GuzzleHttp\Exception\ClientException $e){
			print($e->getResponse());
			die();
		}
	}

}
