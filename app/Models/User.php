<?php

namespace App\Models;

use App\Notifications\CustomVerifyEmailNotification;
use App\Notifications\CustomVerifyEmailNotifications;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;




class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->activation_token = Str::random(60);
        });
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class,'sales_id');
    }

    public function profilePicture()
    {
        return $this->hasOne(ProfilePicture::class);
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function salesRep()
{
    return $this->belongsTo(User::class);
}


    public function walletStatements()
    {
        return $this->hasMany(WalletStatement::class);
    }
    public function isActive()
    {
        // Adjust this condition based on your deactivation logic
        return $this->deactivated_at === NULL; // Assuming 'status' is a column in your 'users' table
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmailNotification);
    }


    public function sendEmailVerificationNotifications($password)
    {
        $this->notify(new CustomVerifyEmailNotifications($password));
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'serial_number',
        'password',
        'phone_number',
        'city',
        'country',
        'service',
        'notes',
        'level',
        'wallet_amount',
        'commission_status',
        'commission_percentage',
        'account_name',
        'acccount_number',
        'bank_name',
        'payment_status',
        'enrollment_status',
        'check_id',
        'sales_id',
        'upline',
        'sub_amount',
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
