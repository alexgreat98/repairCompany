<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Common\FileSystem;
use App\Http\Requests\StoreServiceRequest;
use App\Image;
use App\Service;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = Service::all();
        return response()->json(compact('items'));
    }

    /**
     * @param StoreServiceRequest $request
     * @return JsonResponse
     */
    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->all());
        return response()->json([
            'item' =>$service
        ]);
    }


    /**
     * @param Service $service
     * @return JsonResponse
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
     * @return JsonResponse
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
     * @return JsonResponse
     * @throws Exception
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
     * @return JsonResponse
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

    /**
     * @param Request $request
     * @param Service $service
     * @return bool|mixed|string
     */
    public function ServiceImageAdd(Request $request, Service $service)
    {
        $fileUrl = FileSystem::add_service_image($request);
        $service->image = $fileUrl;
        $service->save();
        return $service->image;

    }
    public function ServiceImageDelete(Service $service)
    {
        FileSystem::delete_service_image($service->image);
        $service->image = null;
        $service->save();
    }
}
