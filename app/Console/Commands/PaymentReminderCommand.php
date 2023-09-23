<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\PaymentReminder;
use Illuminate\Support\Facades\Mail;

class PaymentReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:reminder';

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
    ->whereDate('created_at', '=', Carbon::now()->subDays(4)->toDateString())
    ->where('usertype', 'user')
    ->get();


        foreach ($users as $user) {
            Mail::to($user->email)->send(new PaymentReminder($user));
            // Update the payment_reminder_sent column or send a notification flag to indicate that the reminder has been sent
        }

        $this->info('Payment reminder sent successfully.');
    }
}
