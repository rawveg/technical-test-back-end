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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inspection_id');
            $table->unsignedBigInteger('component_id');
            $table->unsignedBigInteger('grade_type_id');
            $table->timestamps();

            $table->foreign('inspection_id')->on('inspections')->references('id');
            $table->foreign('component_id')->on('components')->references('id');
            $table->foreign('grade_type_id')->on('grade_types')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
};
