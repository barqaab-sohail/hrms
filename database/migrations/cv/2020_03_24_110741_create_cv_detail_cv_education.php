<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvDetailCvEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_detail_hr_education', function (Blueprint $table) {
            $table->bigInteger('cv_detail_id')->unsigned()->index();
            $table->foreign('cv_detail_id')->references('id')->on('cv_details')->onDelete('cascade');

            $table->bigInteger('hr_education_id')->unsigned()->index();
            $table->foreign('hr_education_id')->references('id')->on('hr_educations')->onDelete('cascade');

            $table->string('institute')->nullable();
            $table->year('passing_year')->nullable();

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
        Schema::dropIfExists('cv_detail_cv_education');
    }
}