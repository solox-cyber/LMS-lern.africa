<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {

                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('phone');
                $table->text('notes')->nullable();
                $table->string('city')->nullable();
                $table->string('country')->nullable();
                $table->string('serial_number')->nullable();
                 $table->string('profile_pictures')->nullable();
                $table->string('password');
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('sales_rep_id')->nullable();
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
               
            });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
