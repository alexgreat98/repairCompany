<?php

namespace App\Http\Controllers\Admin;

use App\Param;
use App\Price;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    protected $type;
    public function __construct()
    {
        $this->type = unserialize(Param::where('key', 'PRICE_TYPE')->first()->value)[0];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $prices = Price::all();
        return response()->json(compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        return response()->json([
            'type' => $this->type,
            'services' => Service::all(),
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Price::create($request->all());

        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Price int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Price $price)
    {
//        $price['services_id'] = $price->service()->first();
        return response()->json([
            'price' => $price,
            'type' => $this->type,
            'services' => Service::all(),
        ]);
    }

    /**
     * @param Request $request
     * @param Price $price
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Price $price)
    {
        $price->update($request->all());
        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * @param Price $price
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Price $price)
    {
        $price->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * @param Service $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function ServicesPrice(Service $service){
        return response()->json([
            'prices' => $service->prices()->get()
        ]);
    }
}
