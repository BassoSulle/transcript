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
        Schema::create('course_semister_modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ac_year_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('semister_id');
            $table->json('module_ids')->nullable();
            $table->timestamps();

            // Foreign key
            $table->foreign('ac_year_id')
                ->references('id')
                ->on('academic_year_progress')
                ->cascadeOnDelete();

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->cascadeOnDelete();

            $table->foreign('semister_id')
                ->references('id')
                ->on('semisters')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_semiser_modules');
    }
};