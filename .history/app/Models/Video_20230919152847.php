<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['path'];
    protected $fillable = ['course_id', 'title'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the SyllabusTitle associated with the video.
     */
    public function syllabusTitle()
    {
        return $this->belongsTo(SyllabusTitle::class);
    }

    /**
     * Get the Subtopic associated with the video.
     */
    public function subtopic()
    {
        return $this->belongsTo(CourseSubtopic::class);
    }
}
