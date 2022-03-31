<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UrlModel;
use App\Mail\ExpireNotification;
use Illuminate\Support\Facades\Mail;


class ExpireUrl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check expired links ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fetch_data = UrlModel::all();
        $this->info('Expired Links');
            $past_time = now()->diffInMinutes($fetch_data->created_at);
            $fetch_data -> each(function ($ulr){
                if($past_time==2){
                    if($ulr->user){
                        Mail::to($url->user->email)->send(new ExpireNotification($url->user->name, $url->short_url));
                    }
                }
            });
            $this->info('Notification Sent');
        return 0;
    }
}
