<?php namespace App\Http\Middleware;

use Closure;
use Auth;


class AdminAuthenticate {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::guest()){
			return redirect()->route('login');
		} else {
			$user = Auth::user();
			if (!$user->is_admin){
				return abort(403,'Anda bukan admin dan tidak berhak mengakses halaman ini');
			}
		}
		return $next($request);
	}

}
