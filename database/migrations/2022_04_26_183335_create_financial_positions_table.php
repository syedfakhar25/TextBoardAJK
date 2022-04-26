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
        Schema::create('financial_positions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('financial_year')->nullable();
            $table->string('yearly_amount')->nullable();
            $table->string('assets_amount')->nullable();
            $table->string('tax_year')->nullable();
            $table->string('yearly_tax_amount')->nullable();
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
        Schema::dropIfExists('financial_positions');
    }
};
