<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    //
    protected $table = 'params';
    protected $fillable = ['key', 'value', 'description'];
}
