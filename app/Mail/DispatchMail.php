<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DispatchMail extends Mailable
{
    use Queueable, SerializesModels;

    public $_name;
    public $_order_id;
    public $_message;
    public $_driver_name;
    public $_dispatch_time;
    public $_driver_phone;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $order_id, $message, $driver_name, $dispatch_time, $driver_phone)
    {
        $this->_name = $name;
        $this->_order_id = $order_id;
        $this->_message = $message;
        $this->_driver_name = $driver_name;
        $this->_dispatch_time = $dispatch_time;
        $this->_driver_phone = $driver_phone;
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
            ->markdown('dispatchmails')
            ->with([
                'name' =>  $this->_name,
                'order_id' => $this->_order_id,
                'message' => $this->_message,
                'driver_name' => $this->_driver_name,
                'dispatch_time' => $this->_dispatch_time,
                'driver_phone' => $this->_driver_phone,
                'link' => 'https://volantco.net/'
            ]);
    }
}
