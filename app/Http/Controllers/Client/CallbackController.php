<?php

namespace App\Http\Controllers\Client;

use App\Callback;
use App\Http\Requests\StoreCallbackRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CallbackController extends Controller
{
    protected $callback;

    public function __construct(Callback $callback)
    {
        $this->callback = $callback;
    }

    public function storeCallbackForm(StoreCallbackRequest $request)
    {
        $this->callback->create($request->all());
    }
}
