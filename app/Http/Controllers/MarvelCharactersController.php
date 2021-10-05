<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MarvelCharactersController extends Controller
{
    public function index() {
        /**
         * This cache was registered in the
         * MarvelCharactersApi Middleware
         */
        $response = Cache::get('marvel-characters', 'No Characters');

        /**
         * Extract the nested character data in array format
         */
        $data = $response['data']['results'];
        
        return view('welcome', [
            'data' => $data
        ]);
    }
}
