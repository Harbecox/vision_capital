<?php

namespace App\Console\Commands;

use App\Models\BannedIp;
use Illuminate\Console\Command;

class UnbunIP extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:unbun-ip {ip}';

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
        BannedIp::query()->where("ip",$this->argument('ip'))->first()?->delete();
    }
}
