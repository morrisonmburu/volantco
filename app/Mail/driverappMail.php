<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class driverappMail extends Mailable
{
    use Queueable, SerializesModels;

    public $_name;
    public $_message;
    public $_contact_no;
    public $_token;
    public $_rider_password;
    public $_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $message, $contact_no, $token, $rider_password, $email)
    {
        $this->_name = $name;
        $this->_message = $message;
        $this->_contact_no = $contact_no;
        $this->_token = $token;
        $this->_rider_password = $rider_password;
        $this->_email = $email;
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
            ->markdown('mails_driver')
            ->with([
                'name' =>  $this->_name,
                'title' => $this->_name,
                'message' => $this->_message,
                'contact_no' => $this->_contact_no,
                'token' => $this->_token,
                'rider_password' => $this->_rider_password,
                'email' => $this->_email,
                'link' => 'https://volantco.net/'
            ]);
    }
}
