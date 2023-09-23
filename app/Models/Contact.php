<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'notes',
        'city',
        'country',
        'password',
        'upline',
        'service',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function salesRep()
{
    return $this->belongsTo(User::class, 'sales_id');
}

    public function profilePicture()
    {
        return $this->hasOne(ProfilePicture::class);
    }
}

