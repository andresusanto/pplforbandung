<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;

use App\Terminal;
use Request;
use Carbon\Carbon;

class ApiController extends Controller {
	function getDaftarTerminal(){
		$terminals = Terminal::all();
		$value = array();

		foreach ($terminals as $terminal) {
			$value[] = [
				'id' => $terminal->id,
				'nama' => $terminal->nama,
				'alamat' => $terminal->alamat
			];
		}

		$json = json_encode($value);
		return $json;
	}
}