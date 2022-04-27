<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
                $table->string('father_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('husband_name')->nullable();
            $table->string('cnic')->unique();
            $table->string('father_cnic')->unique();
            $table->string('husband_cnic')->unique();
            $table->string('email')->unique();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();

            $table->string('firm_name')->nullable();
            $table->string('firm_phone')->nullable();
            $table->string('firm_cell')->nullable();
            $table->string('firm_address')->nullable();
            $table->string('firm_status')->nullable();
            $table->string('firm_tax_no')->nullable();
            $table->string('firm_gst_no')->nullable();



            $table->string('user_type')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
