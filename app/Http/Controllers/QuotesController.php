<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Rules\PasswordMatch;

class QuotesController extends Controller
{
    

    public function index(Request $request){
        
        if($request->session()->get('authenticated') == 'true'){

            $collection = collect(array());

            foreach( range(1, 5) as $index ){

                $apiResponse = Http::get('https://api.kanye.rest/text');

                $collection->push( $apiResponse->body() );
                
            }


            return view( 'index' )->with( compact('collection') );
        
        }else{
            return redirect('/login');
        }

        
    }

    public function login(Request $request){
    
        return view( 'login' );

    }

    public function auth(Request $request){
        
        $validated = $request->validate([
           "password" => ["required", new PasswordMatch ]
        ]);

        if($validated){
            $request->session()->put( 'authenticated', 'true' );

            return redirect( '/' );
        }       
        

    }



}
