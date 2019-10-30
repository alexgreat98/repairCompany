<?php


namespace App\Services;


use App\Callback;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CallbackClientService
{

    protected $callback;

    public function __construct(Callback $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param Request $request
     * @return Callback|Model
     */
    public function CreateCallback(Request $request)
    {
        $request['comment'] = '';
        if (!empty($request['order'])) {
            foreach ($request['order'] as $order) {
                $request['comment'] .= $order['name'];
                $value = (int)$order['value'];
                if (is_null($order['value'])) {
                    $value = 1;
                }
                $request['comment'] .= ' кол.: ';
                $request['comment'] .= $value;
                $request['comment'] .= ' на сумму: ';
                $request['comment'] .= $value * (int)$order['price'];
                $request['comment'] .= chr(0x0D) . chr(0x0A);
            }
        }
        return $this->callback->create($request->except('order'));

    }
}
