<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerPicture extends Model
{
    use HasFactory;
    protected $table = 'banner_pictures';
    protected $fillable = ['path'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
