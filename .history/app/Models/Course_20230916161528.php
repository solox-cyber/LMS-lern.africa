<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_logo',
        'course_name',
        'tuition_fee',
        'about_course',
        'start_date',
        'instructor_name',
        'course_syllabus',
        'instructor_bio',
        'other_information',
        'course_obj',
        'course_cat',
        'course_tag',
    ];

    public function profilePicture()
    {
        return $this->hasOne(ProfilePicture::class);
    }

    public function bannerPicture()
    {
        return $this->hasOne(BannerPicture::class);
    }

    public function syllabusTitles()
    {
        return $this->hasMany(SyllabusTitle::class, 'course_id');
    }

    public function users()
    {
        return $this->hasMany(User::class,'service');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, '');
    }
}
