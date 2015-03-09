<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class Studios {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
    {

        //Auth::logout(); 

        $elven_antimage = Auth::check(); //  Making this guy the Auth for science...

        if (empty($elven_antimage)) 
        {
            return redirect('home');
        }

		return $next($request);
	}

}
