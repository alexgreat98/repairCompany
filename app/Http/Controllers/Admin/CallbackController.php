<?php

namespace App\Http\Controllers\Admin;

use App\Callback;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CallbackController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(['items' => Callback::all()]);
    }


    /**
     * @param Callback $callback
     * @return JsonResponse
     */
    public function edit(Callback $callback)
    {
        $callback->look = true;
        $callback->save();
        return response()->json(['item' => $callback]);
    }


    /**
     * @param Request $request
     * @param Callback $callback
     * @return JsonResponse
     */
    public function update(Request $request, Callback $callback)
    {

        $status = $callback->update($request->all());
        $callback->answer = $request->input('answer');
        $callback->save();
        return response()->json(['status' => $status]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $status = Callback::destroy($id);
        return response()->json(['status' => $status]);
    }

}
