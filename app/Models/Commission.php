<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = [
        'user_id',
        'commission_amount',
        'commission_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
