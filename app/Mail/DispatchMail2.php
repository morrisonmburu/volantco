<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DispatchMail2 extends Mailable
{
    use Queueable, SerializesModels;

    public $_name;
    public $_order_id;
    public $_message;
    public $_dispatch_time;
    public $_customer_phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $order_id, $message, $dispatch_time, $customer_phone)
    {
        $this->_name = $name;
        $this->_order_id = $order_id;
        $this->_message = $message;
        $this->_dispatch_time = $dispatch_time;
        $this->_customer_phone = $customer_phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('morrisonmburu7@gmail.com', 'Volant Co Ltd')
            ->subject('Do not reply, Volant Co Ltd')
            ->markdown('dispatchmails2')
            ->with([
                'name' =>  $this->_name,
                'order_id' => $this->_order_id,
                'message' => $this->_message,
                'dispatch_time' => $this->_dispatch_time,
                'customer_phone' => $this->_customer_phone,
                'link' => 'https://volantco.net/'
            ]);
    }
}
