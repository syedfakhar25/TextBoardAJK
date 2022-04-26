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
        Schema::create('publishing_experiences', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('years_in_publishing')->nullable();
            $table->string('no_of_books')->nullable();
            $table->string('no_of_qurans')->nullable();
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
        Schema::dropIfExists('publishing_experiences');
    }
};
