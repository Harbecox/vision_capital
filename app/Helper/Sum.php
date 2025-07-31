<?php


namespace App\Helper;


class Sum
{
    static function clear($sum_string){
        $pattern = '/[\d.]+/';
        preg_match_all($pattern, $sum_string, $matches);
        return floatval(implode('', $matches[0]));
    }

    static function toString($sum){
        $prefix = "";
        if($sum < 0){
            $sum *=-1;
            $prefix = "-";
        }
        return $prefix."$".number_format(self::clear($sum), 2);
    }
}
