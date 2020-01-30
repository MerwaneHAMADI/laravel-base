<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id');
            $table->string('name_prefix');
            $table->string('firstname');
            $table->string('middle_initial');
            $table->string('lastname');
            $table->string('gender');
            $table->string('email');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('mother_maiden');
            $table->date('birthdate');
            $table->date('joining_date');
            $table->integer('salary');
            $table->string('ssn');
            $table->string('phone');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
