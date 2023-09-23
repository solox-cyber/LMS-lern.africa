<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the video
            $table->string('file_path'); // File path to the uploaded video
            $table->unsignedBigInteger('course_id'); // Foreign key to associate with the Course
            $table->unsignedBigInteger('syllabus_title_id'); // Foreign key to associate with the SyllabusTitle
            $table->unsignedBigInteger('subtopic_id'); // Foreign key to associate with the Subtopic
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('syllabus_title_id')->references('id')->on('syllabus_titles')->onDelete('cascade');
            $table->foreign('subtopic_id')->references('id')->on('course_subtopics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
