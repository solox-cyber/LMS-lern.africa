<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;;
use App\Models\User;

class PaymentReminder extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $serialNumber = $this->user->serial_number;
        $userName = $this->user->name;

        return $this->subject('Time is Running Out! Secure Your Reserved Seat at Lern.Africa')
            ->view('emails.payment_reminder', compact('serialNumber', 'userName'));
    }

}
