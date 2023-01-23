<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

use App\Rules\PasswordMatch;

class QuotesController extends Controller
{
    

    public function index(Request $request){

        if($request->session()->get('authenticated') == 'true'){

            $collection = collect(array());
            $cachedQuotes = Cache::get('quotes');
            $cachedQuotes = (!isset($cachedQuotes)) ? collect([]) : $cachedQuotes;

            if(count($cachedQuotes) > 0){
                foreach( range(1, 5) as $index ){
                    $random = $cachedQuotes[rand(0,count($cachedQuotes))];
    
                    $collection->push( $random );
                    
                }
            }



            return view( 'index' )->with( compact('collection') );
        
        }else{
            return redirect('/login');
        }

        
    }

    public function login(){
 
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


    public function fetchQuotes() {

        $collection = collect(array());

        for( $i=0; $i<5; $i++ ){

            $apiResponse = Http::get('https://api.kanye.rest/text');

            if(!$collection->contains($apiResponse->body())){
                
                $collection->push( $apiResponse->body() );

            }else{

                $i -= 1;

            }
        }

        return $collection;
    }


    public function quoteApi() {

        return $this->fetchQuotes();
        
    }

}
