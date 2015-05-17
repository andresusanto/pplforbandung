<?php namespace App\Library;

use Mail;

class SendMail
{
	public static function sendMail(){
		Mail::send('linkizin', [], function($message)
		{
			//$message->to('riadysastrak@gmail.com', 'riady')->subject( "Persetujuan izin" );
                $message->to('timothy.pratama@gmail.com', 'Timothy')->subject( "Persetujuan Izin" );
		});
	}
	
	public static function sendMailAccept($id){
		$a = 'Berikut tautan menuju dokumen persetujuan http://localhost:8000/suratizin/view/'.$id;
		Mail::raw($a, function($message)
		{
			//$message->to('riadysastrak@gmail.com', 'riady')->subject( "Dokumen persetujuan" );
            $message->to('timothy.pratama@gmail.com', 'Timothy')->subject( "Dokumen Persetujuan" );
		});
	}

}