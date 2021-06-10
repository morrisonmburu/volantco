<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $_name;
    public $_lastname;
    public $_contact_inquiry;
    public $_contact_message;
    public $_contact_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $lastname, $contact_inquiry, $contact_message, $contact_email)
    {
        $this->_name = $name;
        $this->_lastname = $lastname;
        $this->_contact_inquiry = $contact_inquiry;
        $this->_contact_message = $contact_message;
        $this->_contact_email = $contact_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->_contact_email, $this->_name)
            ->subject('Contacting Volant Ltd')
            ->markdown('contactmails')
            ->with([
                'name' =>  $this->_name,
                'lastname' => $this->_lastname,
                'title' => $this->_contact_inquiry,
                'message' => $this->_contact_message,
                'email' => $this->_contact_email,
                'link' => 'https://volantco.net/'
            ]);
    }
}
