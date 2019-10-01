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
        'keywords'
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    public function prices()
    {
        return $this->belongsToMany(ServicesHasPrices::class, 'services_has_prices', 'services_id', 'prices_id');
    }
}
