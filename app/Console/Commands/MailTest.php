<?php

namespace App\Console\Commands;

use App\Jobs\MailRegisterJob;
use App\Models\User;
use Illuminate\Console\Command;

class MailTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mail-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        MailRegisterJob::dispatch(User::find(1));
    }
}
