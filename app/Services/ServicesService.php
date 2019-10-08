<?php


namespace App\Services;


use App\Service;

class ServicesService
{
        public function getAllServicesPage()
        {
            $services = Service::with('prices')->get();

            foreach ($services as $service)
            {
                $service['price'] = $service->prices->sortBy('price')->first();
            }
            return $services;
        }
}
