<?php
/**
 * Created by PhpStorm.
 * User: jhon
 * Date: 09.10.2019
 * Time: 16:39
 */

namespace App\Helpers\Common;


use App\Param;

class Std
{
    static public function getP($key){
        $p = Param::where('key', $key)->first();
        return $p->value;
    }

}