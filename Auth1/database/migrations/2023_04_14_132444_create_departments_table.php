<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('punit_id');
            $table->unsignedBigInteger('institute_id');
            $table->unsignedBigInteger('college_id');
            $table->string('name');
            $table->foreign('punit_id')->references('id')->on('punits');
            $table->foreign('institute_id')->references('id')->on('institutes');
            $table->foreign('college_id')->references('id')->on('colleges');
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
        Schema::dropIfExists('departments');
    }
}
