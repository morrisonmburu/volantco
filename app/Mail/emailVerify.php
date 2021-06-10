<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class emailVerify extends Mailable
{
    use Queueable, SerializesModels;

    public $_name;
    public $_message;
    public $_url;
    public $_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->_name = $user['username'];
        $this->_message = 'Thanks for signing! please before you login, you must confirm your account';
        $this->_url = 'http://127.0.0.1:8000/volantuser/auth/emailverification/'.$user['email_activation_token'];
        $this->_email = $user['email'];
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
            ->replyto('morrisonmburu7@gmail.com', 'Volant Ltd')
            ->markdown('emailVerify')
            ->with([
                'name' =>  $this->_name,
                'message' => $this->_message,
                'email' => $this->_email,
                'url' => $this->_url,
                'link' => 'https://volantltd.com/'
            ]);
    }
}
