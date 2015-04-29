<?php namespace App\Http\Middleware;

use Closure;
use Session;
use Redirect;

class AuthenticateAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        // check admin in session
        if (Session::has('admin')) {
            return $next($request);
        } else {
            return Redirect('admin/login');
        }
	}

}
