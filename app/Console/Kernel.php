<?php

namespace App\Console;

use App\Mail\ExpireNotification;
use App\Models\UrlModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        // $schedule->command('inspire')->hourly();
        $schedule->call(function (){
            $fetch_data = UrlModel::all();
            $past_time = now()->diffInMinutes($fetch_data->created_at);
            $fetch_data -> each(function ($ulr){
                if($past_time==2){
                    if($ulr->user){
                        Mail::to($url->user->email)->send(new ExpireNotification($url->user->name, $url->short_url));
                    }
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
