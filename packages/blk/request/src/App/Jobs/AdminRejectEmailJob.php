<?php

namespace Blk\Request\App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Blk\Request\App\Mail\AdminRejectEmailTest;
use Illuminate\Support\Facades\Mail;

class AdminRejectEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details  = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user_data1 = $this->details;  
        $mail = Mail::to($user_data1['email'])->send(new AdminRejectEmailTest($user_data1)); 
    }
}
