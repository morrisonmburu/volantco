<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $_name;
    public $_time;
    public $_price;
    public $_info;
    public $_to;
    public $_from;
    // public $_countdown;
    // public $cancel_info;

    public function __construct($name, $time, $price, $info, $to, $from)
    {
       $this->_name = $name;
       $this->_time = $time;
       $this->_price = $price;
       $this->_info = $info;
       $this->_to = $to;
       $this->_from = $from;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('volant@gmail.com', 'Volant Courier')
            ->subject('Do not reply, Volant Couriers')
            ->markdown('mails')
            ->with([
                'name' =>  Auth::user()->name,
                'title' => $this->_name,
                'time' =>  $this->_time,
                'price' =>  $this->_price,
                'info' => $this->_info,
                'to' => $this->_to,
                'from' => $this->_from,
                // 'countdown' => $this->_countdown,
                // 'cancelinfo' => $this->cancel_info,
                'link' => 'http://volantco.net/'
            ]);
    }
}
