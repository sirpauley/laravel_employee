<?php

namespace SES\Http\Middleware;

use Closure;

//additionally added
use View;
use Auth;
use Illuminate\Support\Facades\Input;

class IsLoggedinMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      if(!Auth::check()){
        return redirect()->route('login');
      }else{
        return $next($request);
      }

    }//handle
}
