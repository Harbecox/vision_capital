<?php

namespace App\Console\Commands;

use App\Models\BannedIp;
use Illuminate\Console\Command;

class BanIPList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ban-ip-list';

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
        $ips = BannedIp::query()->orderBy('ip')->get()->toArray();
        $this->table(array_keys($ips[0]), $ips);
    }
}
