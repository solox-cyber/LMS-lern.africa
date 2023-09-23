<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SalesRep extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'country',
        'profile_pictures',
        'deactivated_at',
        'deleted_at',
        'wallet_amount',
        'commission_percentage',
        'account_name',
        'account_number',
        'bank_name',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Define any relationships or additional methods for the SalesRep model here

    public function contacts()
    {
        return $this->hasMany(Contact::class,'sales_rep_id');
    }

    public function user()
{
    return $this->hasOne(User::class);
}

}
