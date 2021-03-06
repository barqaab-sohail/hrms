<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_id')->unsigned();
            $table->tinyInteger('type')->comment('0 for Permanent and 1 for Current');
            $table->string('house')->nullable();
            $table->string('street')->nullable();
            $table->string('town');
            $table->string('tehsil')->nullable();
            $table->string('city');
            $table->string('province');
            $table->string('landline')->nullable();
            $table->string('mobile');
            $table->bigInteger('country_id');
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
