<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\StoreCallbackRequest;
use App\Services\CallbackClientService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class CallbackController extends Controller
{
    protected $callback;

    public function __construct(CallbackClientService $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param StoreCallbackRequest $request
     * @return JsonResponse
     */
    public function storeCallbackForm(StoreCallbackRequest $request)
    {
        $status = $this->callback->CreateCallback($request);

        return response()->json(compact('status'));
    }
}
