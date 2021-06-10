<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class sendMailAdmin extends Mailable
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
    public $_volantusername;
    // public $_countdown;
    // public $cancel_info;

    public function __construct($name, $time, $price, $info, $to, $from, $volantusername)
    {
       $this->_name = $name;
       $this->_time = $time;
       $this->_price = $price;
       $this->_info = $info;
       $this->_to = $to;
       $this->_from = $from;
       $this->_volantusername = $volantusername;
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
            ->markdown('mailsAdmin')
            ->with([
                'name' =>  $this->_volantusername,
                'title' => $this->_name,
                'time' =>  $this->_time,
                'price' =>  $this->_price,
                'info' => $this->_info,
                'to' => $this->_to,
                'from' => $this->_from,
                // 'countdown' => $this->_countdown,
                // 'cancelinfo' => $this->cancel_info,
                'link' => 'https://volantco.net/'
            ]);
    }
}
