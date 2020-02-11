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
            $table->integer('emp_id')->unique();
            $table->string('name_prefix');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('father_name');
            $table->string('mother_name')->nullable();
            $table->string('mother_maiden_name')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('date_of_joining')->nullable();
            $table->integer('salary');
            $table->string('ssn')->nullable();
            $table->string('phone_no')->unique();
            $table->string('city');
            $table->string('state');
            $table->integer('zip')->unique();
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
        Schema::dropIfExists('employees');
    }
}
