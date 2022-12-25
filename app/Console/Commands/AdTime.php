<?php

namespace App\Console\Commands;

use App\Mail\AdTimeMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AdTime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ad:time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify Advertisers every day who have ads the next day';

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
        $this->info("hello let's start");
        $tommorowDate = date('Y-m-d',strtotime("tomorrow"));        // Tommorrow Date
        $ads = Ad::whereDate('start_date', '=', $tommorowDate)->get();
        foreach($ads as $ad)
        {
            $to_email = $ad->user->email;
            Mail::to($to_email)->send(new AdTimeMail());
            $this->info("success");
        }
        $this->info("hello let's end");
    }
}
