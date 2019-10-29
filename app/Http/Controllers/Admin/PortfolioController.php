<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use App\Portfolio;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $portfolio = Portfolio::get();
        //$image = Image::portfolio($portfolio->id);
        $pr = [];
        foreach ($portfolio as $p){
          $p->images = Image::where('portfolio_id', $p->id)->get();
        }
        //$portfolio->images()->get();
        return response()->json($portfolio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'text' => '',
            'description'=>'',
            'title'=>''
        ]);
        $portfolio = Portfolio::create($request->all());

        return response()->json($portfolio);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $images = $portfolio->images;
        return response()->json(compact('portfolio', 'images'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'text' => '',
            'description'=>'',
            'title'=>''
        ]);
        $param = Portfolio::findOrFail($id);
        $param->fill($request->all());
        $param->save();

        return response()->json($param);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $this->authorize($id);
        Portfolio::destroy($id);
        return response()->json('ok');
    }
}
