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
        Schema::create('academic_year_progress', function (Blueprint $table) {
            $table->id();
            $table->string('year_of_studies');
            $table->unsignedBigInteger('current_semister_id');
            $table->boolean('progress_status')->default(false);
            $table->timestamps();

            $table->foreign('current_semister_id')
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
        Schema::dropIfExists('academic_year_progress');
    }
};