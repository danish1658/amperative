<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\QuotesController;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        
        $schedule->call(function () {

            $cacheQuotes = Cache::pull('quotes');

            Cache::forget('quotes');

            $cacheQuotes = (!isset($cacheQuotes)) ? collect([]) : $cacheQuotes; 



            Cache::rememberForever('quotes', function() use($cacheQuotes) {
                $quotes = QuotesController::fetchQuotes();

                
                
                if(count($quotes) > 0){
                    for( $i=0; $i<count($quotes); $i++ ){

        
                        if(!$cacheQuotes->contains($quotes[$i])){
                            
                            $cacheQuotes->push( $quotes[$i] );
            
                        }
                    }
                    return $cacheQuotes;
                }
            });
            
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
