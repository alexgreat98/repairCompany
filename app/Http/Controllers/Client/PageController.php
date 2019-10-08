<?php

namespace App\Http\Controllers\Client;

use App\Portfolio;
use App\Service;
use App\Http\Controllers\Controller;
use App\Services\ServicesService;

class PageController extends Controller
{

    protected $services;

    public function __construct(
        ServicesService $services
    )
    {
        $this->services = $services;
    }

    public function GetPortfolios()
    {
        $portfolios = Portfolio::all();
        return view('portfolios', compact('portfolios'));
    }

    public function GetServices()
    {
        $services = $this->services->getAllServicesPage();
        return view('services', compact('services'));
    }
}
