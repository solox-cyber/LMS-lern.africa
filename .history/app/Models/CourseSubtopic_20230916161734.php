<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubtopic extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'syllabus_title_id', 'title', 'description'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function syllabusTitle()
    {
        return $this->belongsTo(SyllabusTitle::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class, 'subtopic_id');
    }
}
