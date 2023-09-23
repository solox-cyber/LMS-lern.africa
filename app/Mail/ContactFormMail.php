<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $country;

    public $email;

    public $phone_number;
    public $program;
    public $contactMessage ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $country, $phone_number, $program, $contactMessage )
    {
        $this->name = $name;
        $this->email = $email;
        $this->country = $country;
        $this->phone_number = $phone_number;
        $this->program = $program;
        $this->contactMessage  = $contactMessage ;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contact-form')
                    ->subject('New Contact Form Submission')
                    ->from($this->email, $this->name);
    }
}
