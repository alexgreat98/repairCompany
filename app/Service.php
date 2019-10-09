<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'text',
        'image',
        'title',
        'description',
        'keywords',
        'slug',
        'sort',
        'show_on_main'
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function prices()
    {
        return $this->hasMany(Price::class, 'services_id', 'id');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'services_has_images', 'services_id', 'images_id');
    }
}
