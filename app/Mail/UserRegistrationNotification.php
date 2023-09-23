<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $paymentUrl;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $user
     * @param  string  $paymentUrl
     * @return void
     */
    public function __construct($user, $paymentUrl)
    {
        $this->user = $user;
        $this->paymentUrl = $paymentUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user-registration')
            ->subject('Welcome to Lern.Africa')
            ->with([
                'user' => $this->user,
                'paymentUrl' => $this->paymentUrl,
            ]);
    }
}
