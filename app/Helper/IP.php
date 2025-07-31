<?php


namespace App\Helper;


use App\Models\BannedIp;

class IP
{
    static function isBanned($ip){
        $parts = explode(".",$ip);
        $ips = [
            $ip,
            implode(".",array_merge(array_slice($parts,0,3),['*'])),
            implode(".",array_merge(array_slice($parts,0,2),['*','*'])),
            implode(".",array_merge(array_slice($parts,0,1),['*','*','*'])),
        ];
        return BannedIp::query()->whereIn("ip",$ips)->exists();
    }
}
