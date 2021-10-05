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
        $public_key = 'fe9adbc89a78257bc84e784f12d52764';
        $private_key = '9dd5d40302e7e4570c76d9c8a8e4b2ff87b3a793';
        $hash = md5($ts.$private_key.$public_key);
        
        Cache::remember('marvel-characters', 60*60*24, function() use($ts, $public_key, $hash) {
            return Http::get('http://gateway.marvel.com/v1/public/characters?ts='.$ts.'&apikey='.$public_key.'&hash='.$hash)->json();
        });
        return $next($request);
    }
}
