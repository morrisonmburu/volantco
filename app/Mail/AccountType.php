<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountType extends Mailable
{
    use Queueable, SerializesModels;

    public $_name;
    public $_message;
    public $_account_type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $message, $account_type)
    {
        $this->_name = $name;
        $this->_message = $message;
        $this->_account_type = $account_type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@volantco.net', 'Volant Co Ltd')
            ->subject('Do not reply, Volant Co Ltd')
            ->replyto('info@volantco.net', 'Volant Co Ltd')
            ->markdown('accountMails')
            ->with([
                'name' =>  $this->_name,
                'message' => $this->_message,
                'account_type' => $this->_account_type,
                'link' => 'https://volantco.net/'
            ]);
    }
}
