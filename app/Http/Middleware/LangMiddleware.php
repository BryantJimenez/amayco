<?php

namespace App\Http\Middleware;

use Closure;

class LangMiddleware
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
        $urlArray=explode('/', substr(url()->current(), 7));

        if (isset($urlArray[1]) && ($urlArray[1]=="es" || $urlArray[1]=='en')) {
            return $next($request);    
        }
        
        return redirect()->route('home', ['lang' => 'es']);
    }
}
