<?php

namespace App\Console\Commands;

use App\Models\Deposit;
use App\Models\Transfer;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserLog;
use App\Models\Withdrawal;
use Illuminate\Console\Command;

class DeleteUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-user {id}';

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
        $id = $this->argument("id");
        if(is_numeric($id)){
            $id = intval($id);
            User::query()->where("id",$id)->delete();
            UserInfo::query()->where("user_id",$id)->delete();
            UserLog::query()->where("user_id",$id)->delete();
            Withdrawal::query()->where("user_id",$id)->delete();
            Deposit::query()->where("user_id",$id)->delete();
            Transfer::query()->where("user_id",$id)->delete();
        }
    }
}
