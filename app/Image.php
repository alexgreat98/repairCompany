<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['url', 'portfolio_id'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'services_has_images', 'images_id', 'services_id');
    }
}
