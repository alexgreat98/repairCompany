<?php

namespace App\Http\Controllers\Client;

use App\Portfolio;
use App\Service;
use App\Http\Controllers\Controller;
use App\Services\PortfolioService;
use App\Services\ServicesService;

class PageController extends Controller
{

    protected $services;
    protected $portfolio;

    public function __construct(
        ServicesService $services,
        PortfolioService $portfolio
    )
    {
        $this->services = $services;
        $this->portfolio = $portfolio;
    }

    public function GetPortfolios()
    {
        $portfolios = $this->portfolio->GetAllPortfolioPage();
        return view('portfolios', compact('portfolios'));
    }
    public function GetPortfolio(Portfolio $portfolio)
    {
        $portfolio = $this->portfolio->GetPortfolioPage($portfolio);
        return view('portfolio', compact('portfolio'));
    }

    public function GetServices()
    {
        $services = $this->services->getAllServicesPage();
        return view('services', compact('services'));
    }
    public function GetService(Service $service)
    {
        $service = $this->services->getServicePage($service);
        return view('service', compact('service'));
    }
}
