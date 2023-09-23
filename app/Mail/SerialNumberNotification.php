<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;



class SerialNumberNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $serialNumber;
    public $name;

    /**
     * Create a new message instance.
     *
     * @param  string  $serialNumber
     * @return void
     */
    public function __construct($serialNumber,$name)
    {
        $this->serialNumber = $serialNumber;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        $emailTemplate = 'other';
        $user = Auth::user();

        if ($user->usertype === 'user') {
            $emailTemplate = 'serial_number';
        }

        return $this->view('emails.' . $emailTemplate)
            ->subject('Congratulations! Your Reserved Seat Awaits at Lern.Africa!');
    }
}
