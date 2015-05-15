<?php namespace App\Handlers\Events;

use App\Events\IzinUpdatedByAdmin;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class MailToPengguna {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  IzinUpdatedByAdmin  $event
	 * @return void
	 */
	public function handle(IzinUpdatedByAdmin $event)
	{
		\DB::table('temporary')->insert(['nama'=>$event->izin->pengguna->nama]);
	}

}
