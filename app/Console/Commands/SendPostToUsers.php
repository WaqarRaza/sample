<?php

namespace App\Console\Commands;

use App\Jobs\SendingMail;
use Illuminate\Console\Command;

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
        dispatch(new SendingMail());
        return Command::SUCCESS;
    }
}
