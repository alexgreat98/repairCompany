<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'price',
        'type'
    ];

    /**
     * Атрибуты, которые должны быть преобразованы в даты.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    public function images (){
        return $this->hasMany(Image::class, 'portfolio_id', 'id');
    }
}
