<?php namespace App\Http\Middleware;

use Closure;

class LoginMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$requiredPermission=app('session')->get('username');
        // Perform action
    	if ($requiredPermission==null)
        {
            return redirect('index');
        }
		return $next($request);
	}

}
