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
    public $_volantusername;
    public $_description;
    public $_category;
    // public $_countdown;
    // public $cancel_info;

    public function __construct($name, $time, $price, $info, $to, $from, $volantusername, $description, $category)
    {
       $this->_name = $name;
       $this->_time = date("m D, Y", strtotime($time));
       $this->_price = $price;
       $this->_info = $info;
       $this->_to = $to;
       $this->_from = $from;
       $this->_volantusername = $volantusername;
       $this->_description = $description;
       $this->_category = $category;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('morrisonmburu7@gmail.com', 'Volant Ltd')
            ->subject('Do not reply, Volant Ltd')
            ->markdown('mails')
            ->with([
                'name' =>  $this->_volantusername,
                'package' => $this->_name,
                'pickup_time' =>  $this->_time,
                'amount' =>  $this->_price,
                'info' => $this->_info,
                'to' => $this->_to,
                'from' => $this->_from,
                'description' => $this->_description,
                'category' => $this->_category,
                // 'countdown' => $this->_countdown,
                // 'cancelinfo' => $this->cancel_info,
                'link' => 'https://volantltd.com/'
            ]);
    }
}
