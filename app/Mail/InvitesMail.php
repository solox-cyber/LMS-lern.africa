<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contact;

class InvitesMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $contactId;
    public $salesId;

    public $name;
    /**
     * Create a new message instance.
     *
     * @param  Contact  $contact
     * @param  int  $contactId
     * @param  int  $salesId
     * @return void
     */
    public function __construct(Contact $contact, $contactId, $salesId)
    {
        $this->contact = $contact;
        $this->contactId = $contactId;
        $this->salesId = $salesId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $registrationLink = url('contact_register', ['contact_id' => $this->contactId, 'sales_id' => $this->salesId]);

        return $this->view('emails.contacts_mail')
                    ->with([
                        'contact' => $this->contact,
                        'registrationLink' => $registrationLink,
                    ])
                    ->subject('Registration & Payment Link');
    }
}
