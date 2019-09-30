<?php

namespace App\Http\Controllers\Client;

use App\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function GetPortfolio()
    {
        $portfolio = Portfolio::all();
        return view('portfolio', $portfolio);
    }
}
