<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuotesController extends Controller
{
    

    public function index()
    {

        $collection = collect(array());

        foreach( range(1, 5) as $index ){

            $apiResponse = Http::get('https://api.kanye.rest/text');

            $collection->push( $apiResponse->body() );
            
        }


        return view( 'index' )->with( compact('collection') );
    }

}
