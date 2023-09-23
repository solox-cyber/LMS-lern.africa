<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $serialNumber;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(User $user, $serialNumber)
    {
        $this->user = $user;
        $this->serialNumber = $serialNumber;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $verificationUrl = $this->verificationUrl();
        return $this->subject('Email Verification')
                    ->view('emails.emailVerification')
                    ->with([
                        'user' => $this->user,
                        'verificationUrl' => $verificationUrl,
                        'serialNumber' => $this->serialNumber,
                    ]);
    }


    /**
     * Get the verification URL for the user.
     *
     * @return string
     */
    protected function verificationUrl()
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60), // Adjust the expiration time as needed
            [
                'id' => $this->user->getKey(),
                'hash' => sha1($this->user->getEmailForVerification()),
            ]
        );
    }
}
