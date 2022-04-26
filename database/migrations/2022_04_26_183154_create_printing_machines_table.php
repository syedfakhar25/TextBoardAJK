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
        Schema::create('printing_machines', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('color')->nullable();
            $table->string('no_of_machines')->nullable();
            $table->string('size')->nullable();
            $table->string('model')->nullable();
            $table->string('make')->nullable();
            $table->string('impressions')->nullable();
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
        Schema::dropIfExists('printing_machines');
    }
};
