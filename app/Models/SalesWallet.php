<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesWallet extends Model
{
    use HasFactory;
    protected $table = 'sales_wallet';


    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'payment_status',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $primaryKey = 'id'; // If 'id' is the primary key column name

    // Optional: If you don't have timestamps (created_at, updated_at) in your table
    public $timestamps = false;
}
