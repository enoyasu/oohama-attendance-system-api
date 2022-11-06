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
        Schema::create('employee_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('emp_id')->nullable(false);
            $table->integer('h_pay')->nullable(false);
            $table->integer('tel')->nullable(false);
            $table->string('address', 200)->default(null);
            $table->date('birthday')->default(null);
            $table->string('memo', 500)->default(null);
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
        Schema::dropIfExists('employee_profile');
    }
};
