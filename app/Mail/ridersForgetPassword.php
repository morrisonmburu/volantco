<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ridersForgetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $_name;
    public $_message;
    public $_token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $message, $token)
    {
        $this->_name = $name;
        $this->_message = $message;
        $this->_token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@volantltd.com', 'Volant Ltd')
            ->subject('Reset Password Notification')
            ->markdown('ridersReset')
            ->with([
                'name' =>  $this->_name,
                'title' => $this->_name,
                'message' => $this->_message,
                'token' => $this->_token,
                'link' => 'https://volantltd.com/'
            ]);
    }
}
