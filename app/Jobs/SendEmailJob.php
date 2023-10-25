<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\BookInfo;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $bookData;

    /**
     * Create a new job instance.
     *
     * @param $bookData
     */
    public function __construct($bookData)
    {
        $this->bookData = $bookData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::where('role', 'caller')->orWhere('role', 'admin')->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new BookInfo($this->bookData));
        }        
    }
}
