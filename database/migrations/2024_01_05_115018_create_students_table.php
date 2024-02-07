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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('surname');
            $table->unsignedBigInteger('registration_no');
            $table->unsignedBigInteger('course_id');
            $table->string('email')->unique();
            $table->string('gender');
            $table->date('dob');
            $table->string('passport_size')->nullable();
            $table->string('role')->default('Student');
            $table->string('password')->default(bcrypt('12345'));
            $table->rememberToken();
            $table->timestamps(); // created_at will be admission date

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
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
        Schema::dropIfExists('students');
    }
};