<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\DeliveryAddress;
use App\Models\Order;

class OrderConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $deliveryAddress;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, DeliveryAddress $deliveryAddress)
    {
        $this->order = $order;
        $this->deliveryAddress = $deliveryAddress;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order_confirm');
    }
}
