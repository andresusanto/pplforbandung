<?php namespace App\Http\Controllers;
use Mail;

class SendMailController extends Controller 
{
    public function index()
    {
		return view("sendmail");
       
    }
	
	public function getLink(){
		return view("linkizin");
	}
	
	public function sendMail(){
		Mail::send('linkizin', [], function($message)
		{
			$message->to('riadysastrak@gmail.com', 'lalala')->subject( "Nyobain" );
		});
	}
}