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
        Schema::create('habitat_aves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ave_id')->references('id')->on('aves')->onDelete('cascade');
            $table->foreignId('habitat_id')->references('id')->on('habitas')->onDelete('cascade');
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
        Schema::dropIfExists('habitat_aves');
    }
};
