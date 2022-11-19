<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\PostsEmail;
use Illuminate\Support\Facades\Mail;

class SendPostToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:send_to_users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email posts to users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = \App\Models\User::select('name','email')->get();

        Mail::to($users)->queue(new PostsEmail());

        return Command::SUCCESS;
    }
}
