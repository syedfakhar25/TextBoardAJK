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
        Schema::create('godown_facilities', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('godown_owner')->nullable();
            $table->string('godown_area')->nullable();
            $table->string('godown_address')->nullable();
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
        Schema::dropIfExists('godown_facilities');
    }
};
