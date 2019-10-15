<?php

namespace App\Http\Controllers\Client;

use App\Callback;
use App\Http\Requests\StoreCallbackRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class CallbackController extends Controller
{
    protected $callback;

    public function __construct(Callback $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param StoreCallbackRequest $request
     * @return JsonResponse
     */
    public function storeCallbackForm(StoreCallbackRequest $request)
    {
        $status = $this->callback->create($request->all());
        return response()->json(compact('status'));
    }
}
