<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Permohonan;
use App\Perizinan;
use Request;
use Carbon\Carbon;
use Response;

class DownloadController extends Controller {
	public function downloadLampiran($filename){
        $file= public_path().'/storage/'.Session::get('user')->id.'/'.$filename;
        $headers = array(
          'Content-Type: application/pdf',
        );
        return Response::download($file, Session::get('user')->id.'.pdf', $headers);
    }

    public function downloadBuktiPembayaran($filename){
    	$file= public_path().'/storage/'.Session::get('user')->id.'/'.$filename;
        $headers = array(
          'Content-Type: image/jpeg',
        );
        return Response::download($file, Session::get('user')->id.'.jpg', $headers);
    }
}