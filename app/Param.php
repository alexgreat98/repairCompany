<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Param extends Model
{

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'key';
    }

    //
    protected $table = 'params';
    protected $fillable = ['key', 'value'];
    static public function getP($key){
            $p = Param::where('key', $key)->first();
            return $p->value;
    }
}
