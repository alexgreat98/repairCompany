<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\StoreCallbackRequest;
use App\Mail\OrderCreated;
use App\Services\CallbackClientService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
        $callback = $this->callback->CreateCallback($request);
//        Mail::send(new OrderCreated($callback));
        return response()->json(compact('callback'));
    }
}
