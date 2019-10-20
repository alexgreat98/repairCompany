<?php


namespace App\Services;


use App\Portfolio;

class PortfolioService
{
    public function GetPortfolioIndexPage()
    {
        $portfolios = Portfolio::with('images')->where('show_on_main', true)->get();
        foreach ($portfolios as $portfolio)
        {
            $portfolio['image'] = $portfolio->images->first();
        }
        return $portfolios;
    }
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
        $portfolio['relative'] = Portfolio::all();
        foreach ($portfolio['relative'] as $value)
        {
            $value['image'] = $value->images->first();
        }
        return $portfolio;
    }
}
