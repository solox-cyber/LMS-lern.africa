<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyllabusTitle extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function coursesubtopic()
    {
        return $this->hasMany(CourseSubtopic::class, 'syllabus_title_id');
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'syllabus_title_id');
    }
}
