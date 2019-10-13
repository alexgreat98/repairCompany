<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __invoke()
    {
        $api_token = '';
        if(!empty(Auth::user())){
            $api_token = Auth::user()->api_token ;
        }
        return view('admin/index', compact('api_token'));
    }
}
