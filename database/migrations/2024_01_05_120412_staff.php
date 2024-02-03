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
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('surname');
            $table->string('role');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('password');
            $table->rememberToken();
            // $table->json('module_ids')->nullable();
            $table->timestamps();

            $table->foreign('department_id')
            ->references('id')
            ->on('departments')
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
        Schema::dropIfExists('staffs');
    }
};