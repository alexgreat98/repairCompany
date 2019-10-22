<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'comment',
        'order'
    ];
    protected $guarded = [
        'answer',
        'look',

    ];
}
