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
        Schema::create('binding_facilities', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('auto_machine')->nullable();
            $table->string('stich_machine')->nullable();
            $table->string('sewing_machine')->nullable();
            $table->string('single_clamp')->nullable();
            $table->string('three_clamp')->nullable();
            $table->string('five_clamp')->nullable();
            $table->string('ten_clamps')->nullable();
            $table->string('single_knife')->nullable();
            $table->string('three_knives')->nullable();
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
        Schema::dropIfExists('binding_facilities');
    }
};
