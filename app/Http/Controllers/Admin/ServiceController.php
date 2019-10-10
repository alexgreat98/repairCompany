<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Common\FileSystem;
use App\Image;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Service::all();
        return response()->json(compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $service = Service::create($request->all());
        return response()->json([
            'item' =>$service
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
     * @param Service $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Service $service)
    {
        return response()->json([
            'item' => $service,
        ]);
    }

    /**
     * @param Request $request
     * @param Service $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Service $service)
    {
        $service->update($request->all());
        return response()->json([
            'item' => $service
        ]);
    }

    /**
     * @param Service $service
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return response()->json([
            'items' => Service::all()
        ]);
    }

    /**
     * @param Service $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function ServicesImage(Service $service)
    {
        return response()->json([
            'images' => $service->images()->get()
        ]);
    }

    public function ServicesImageAttach(Service $service,Image $image){
        $service->images()->attach($image);
    }
    /**
     * @param Image $image
     */
    public function ServicesImageDetach(Image $image)
    {
        $image->services()->detach();
    }

    public function ServiceImageDelete(Service $service)
    {
        FileSystem::delete_service_image($service);
    }
}
