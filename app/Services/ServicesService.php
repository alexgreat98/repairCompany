<?php


namespace App\Services;


use App\Service;

class ServicesService
{
    public function GetAllServicesIndexPage()
    {
        $services = Service::all('name');
        return $services;
    }

    public function GetPortfolioIndexPage()
    {
        $services = Service::with('prices')->where('show_on_main', true)->get();
        foreach ($services as $service) {
            $service['price'] = $service->prices->sortBy('price')->first();
        }
        return $services;
    }

    public function getAllServicesPage()
    {
        $services = Service::with('prices')->get();

        foreach ($services as $service) {
            $service['price'] = $service->prices->sortBy('price')->first();
        }
        return $services;
    }

    public function getServicePage(Service $service)
    {
        $service['prices'] = $service->prices()->orderBy('sort')->get();
        $service['images'] = $service->images()->get();
        return $service;
    }
}
