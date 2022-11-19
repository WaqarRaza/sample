<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\PostsEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Repositories\PostCrudRepository;

class SendingMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $users;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->users =  \App\Models\User::select('name','email')->get();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // what I understand is to send all post to all users
        Mail::to($this->users)->queue(new PostsEmail((new PostCrudRepository)->index()));
    }
}
