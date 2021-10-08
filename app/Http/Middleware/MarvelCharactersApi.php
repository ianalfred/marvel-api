<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MarvelCharactersApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * This middleware makes a get request to Marvel Api
         * & caches it after every 24 hrs
         */

        $ts = time();
        $public_key = config('services.marvel.public_key');
        $private_key = config('services.marvel.private_key');
        $hash = md5($ts.$private_key.$public_key);
        
        Cache::remember('marvel-characters', 60*60*24, function() use($ts, $public_key, $hash) {
            return Http::get('http://gateway.marvel.com/v1/public/characters?ts='.$ts.'&apikey='.$public_key.'&hash='.$hash)->json();
        });
        return $next($request);
    }
}
