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
        Schema::create('lecturer_modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lecturer_id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('semister_id');
            $table->boolean('complete_status')->default(false);
            $table->timestamps();

            // Foreignkey
            $table->foreign('lecturer_id')
                ->references('id')
                ->on('staffs')
                ->cascadeOnDelete();

            $table->foreign('module_id')
                ->references('id')
                ->on('modules')
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
        Schema::dropIfExists('lecturer_modules');
    }
};