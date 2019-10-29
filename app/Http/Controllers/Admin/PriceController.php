<?php

namespace App\Http\Controllers\Admin;

use App\Param;
use App\Price;
use App\Service;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    protected $type;
    protected $price;

    public function __construct(Price $price)
    {
        $this->type = explode(';', Param::where('key', 'PRICE_TYPE')->first()->value);
        $this->price = $price;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $prices = Price::all();
        return response()->json(compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
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
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $this->price::create($request->all());

        return response()->json([
            'status' => 'success'
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Price int  $id
     * @return JsonResponse
     */
    public function edit(Price $price)
    {
        return response()->json([
            'price' => $price,
            'type' => $this->type,
            'services' => Service::all(),
        ]);
    }

    /**
     * @param Request $request
     * @param Price $price
     * @return JsonResponse
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
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Price $price)
    {
        $this->authorize($price);
        $price->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * @param Service $service
     * @return JsonResponse
     */
    public function ServicesPrice(Service $service)
    {
        return response()->json([
            'prices' => $service->prices()->get()
        ]);
    }
}
