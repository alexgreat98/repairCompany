<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function prices()
    {
        return $this->belongsToMany(ServicesHasPrices::class, 'services_has_prices', 'services_id', 'prices_id');
    }
}
