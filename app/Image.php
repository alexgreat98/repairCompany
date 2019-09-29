<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function supCategory()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }
}
