<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateSalesRepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


public function up()
{
    Schema::create('sales_reps', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->string('phone_number')->nullable();
        $table->string('country')->nullable();
        $table->string('profile_pictures')->nullable();
        $table->timestamp('deactivated_at')->nullable();
        $table->timestamp('deleted_at')->nullable();
        $table->timestamps();
        $table->float('wallet_amount')->default(0.0);
        $table->float('commission_percentage')->default(0.0);
        $table->string('account_name')->nullable();
        $table->string('account_number')->nullable();
        $table->string('bank_name')->nullable();

        // $table->string('password');

        // Auto-generate password
        $password = 'password'; // Set your default password here
        $hashedPassword = Hash::make($password);
        $table->string('password')->default($hashedPassword);
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_reps');
    }
}
