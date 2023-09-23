<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingUser extends Model
{
    use HasFactory;

    protected $table = 'pending_users';

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function salesRep()
    {
        return $this->belongsTo(User::class, 'sales_id');
    }
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
