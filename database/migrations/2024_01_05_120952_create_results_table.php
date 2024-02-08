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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_reg_no');
            $table->string('module_code');
            $table->double('c_a_marks');
            $table->double('f_e_marks');
            $table->double('total_marks');
            $table->unsignedBigInteger('grade_id')->nullable();
            $table->unsignedBigInteger('staff_id');
            $table->timestamps(); //created_at will be used as uploaded_date

            $table->foreign('grade_id')
                ->references('id')
                ->on('grades')
                ->cascadeOnDelete();

            $table->foreign('staff_id')
                ->references('id')
                ->on('staffs')
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
        Schema::dropIfExists('results');
    }
};