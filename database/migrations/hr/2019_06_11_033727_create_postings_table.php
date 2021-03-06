<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_id')->unsigned();
            $table->string('designation_id');
            $table->date('posting_date');
            $table->bigInteger('project_id')->unsigned();
            $table->date('joining_date');
            $table->string('location')->nullable();
            $table->bigInteger('manager_id')->unsigned();
            $table->timestamps();
            $table->foreign('manager_id')->references('id')->on('employees');
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
        Schema::dropIfExists('postings');
    }
}
