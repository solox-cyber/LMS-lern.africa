<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class SendPaymentReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:reminder5days';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send payment reminder to users with pending payment status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('payment_status', 'pending')
            ->whereDate('created_at', '=', Carbon::now()->subDays(5)->toDateString())
            ->get();

        foreach ($users as $user) {
            // Send the payment reminder email
            $this->sendPaymentReminderEmail($user);
        }

        $this->info('Payment reminder emails sent successfully.');
    }

    private function sendPaymentReminderEmail(User $user)
    {
        // Prepare data for the email
        $data = [
            'userName' => $user->name,
            'serialNumber' => $user->serial_number,
        ];

        // Send the email using the payment_reminder template
        Mail::send('emails.payment_remindertwo', $data, function ($message) use ($user) {
            $message->to($user->email, $user->name)
                ->subject('Last Chance to Secure Your Seat at Lern.Africa');
        });

        Mail::send('emails.payment_reminderthree', $data, function ($message) use ($user) {
            $message->to($user->email, $user->name)
                ->subject('Act Now to Secure Your Reserved Seat and Accelerate Your Earnings!');
        });
    }
}
