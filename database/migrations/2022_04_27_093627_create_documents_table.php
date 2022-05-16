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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('cnic')->nullable();
            $table->string('father_cnic')->nullable();
            $table->string('declaration')->nullable();
            $table->string('purchase_deed')->nullable();
            $table->string('rent_deed')->nullable();
            $table->string('electricity_bill')->nullable();
            $table->string('equipment_voucher')->nullable();
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
        Schema::dropIfExists('documents');
    }
};
