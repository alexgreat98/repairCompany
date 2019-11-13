<?php

namespace App\Mail;

use App\Callback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $callback;

    /**
     * Create a new message instance.
     *
     * @param Callback $callback
     */
    public function __construct(Callback $callback)
    {
        $this->callback = $callback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.orders.created');
    }
}
