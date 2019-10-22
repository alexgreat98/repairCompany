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
        $callback = New $this->callback;
        $callback->name = $request->input('name');
        $callback->phone = $request->input('phone');
        $callback->comment = '';
        if (!empty($request->input('order'))) {
            foreach ($request->input('order') as $order) {
                $callback->comment .= $order['name'];
                $value = (int)$order['value'];
                if (is_null($order['value'])) {
                    $value = 1;
                }
                $callback->comment .= ' кол.: ';
                $callback->comment .= $value;
                $callback->comment .= ' на сумму: ';
                $callback->comment .= $value * (int)$order['price'];
                $callback->comment .= chr(0x0D).chr(0x0A);
            }
        }
        $status = $callback->save();
        return response()->json(compact('status'));
    }
}
