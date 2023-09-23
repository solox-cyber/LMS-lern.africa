<?php

namespace App\Mail;

use App\Models\PendingUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;
    public $contactId;
    public $salesId;

    /**
     * Create a new message instance.
     *
     * @param  PendingUser  $contact
     * @param  int  $contactId
     * @param  int  $salesId
     * @return void
     */
    public function __construct(PendingUser $contact, $contactId, $salesId)
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
        $registrationLink = url('register', ['contact_id' => $this->contactId, 'sales_id' => $this->salesId]);

        return $this->view('emails.contact_mail')
                    ->with([
                        'user' => $this->contact,
                        'registrationLink' => $registrationLink,
                    ])
                    ->subject('Registration Payment Link');
    }
}
