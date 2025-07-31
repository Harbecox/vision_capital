<?php

namespace App\Helper;

class Settings
{
    static function get($name,$default = null){
        $s = \App\Models\Settings::query()->where("name",$name)->first();
        return $s ? $s->value : $default;
    }

    static function set($name,$value){
        $s = \App\Models\Settings::query()->where("name",$name)->first() ?? new \App\Models\Settings();
        $s->name = $name;
        $s->value = $value;
        $s->save();
    }
}
