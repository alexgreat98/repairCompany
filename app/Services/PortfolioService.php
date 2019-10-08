<?php


namespace App\Services;


use App\Portfolio;

class PortfolioService
{
    public function GetAllPortfolioPage()
    {
        $portfolios = Portfolio::with('images')->get();
        foreach ($portfolios as $portfolio)
        {
            $portfolio['image'] = $portfolio->images->first();
        }
        return $portfolios;
    }

    public function GetPortfolioPage(Portfolio $portfolio)
    {
        $portfolio['images'] = $portfolio->images()->get();
        return $portfolio;
    }
}
