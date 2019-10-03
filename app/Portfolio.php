<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolio';
    protected $fillable = ['name', 'text', 'description', 'title'];
    public function images (){
        return $this->hasMany(Image::class, 'portfolio_id', 'id');
    }
}
