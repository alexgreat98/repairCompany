<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function images (){
        return $this->hasMany(Image::class, 'portfolio_id', 'id');
    }
}
