<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EnrolmentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('courses', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('shortname')->unique();
          $table->decimal('monthly_payment', 8, 2);
          $table->decimal('degree_payment', 8, 2);
          $table->timestamps();
      });
      Schema::create('students', function (Blueprint $table) {
          $table->increments('id');
          $table->string('firstname');
          $table->string('middlename');
          $table->string('lastname');
          $table->string('email');
          $table->string('phone');
          $table->string('mobile');
          $table->timestamps();
      });
      Schema::create('groups', function (Blueprint $table) {
          $table->increments('id');
          $table->string('shortname');
          $table->integer('course_id')->unsigned();

          $table->foreign('course_id')->references('id')->on('courses');
          $table->timestamps();
      });
      Schema::create('modules', function (Blueprint $table) {
          $table->increments('id');
          $table->string('shortname');
          $table->smallInteger('number');
          $table->timestamps();
      });
      Schema::create('banks', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->timestamps();
      });
      Schema::create('enrolments', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('group_id')->unsigned();
          $table->integer('student_id')->unsigned();
          $table->string('state');
          $table->decimal('discount', 8, 2);
          $table->decimal('surcharge', 8, 2);
          $table->text('description');
          $table->string('registration_number');
          $table->timestamp('enrolment_date')->nullable();
          $table->timestamp('due_date')->nullable();

          $table->foreign('group_id')->references('id')->on('groups');
          $table->foreign('student_id')->references('id')->on('students');
          $table->timestamps();
      });
      Schema::create('payments', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('number');
          $table->decimal('amount', 8, 2);
          $table->string('type');
          $table->string('reference');
          $table->integer('bank_id')->unsigned();
          $table->string('bill');
          $table->text('description');
          $table->timestamp('payment_date')->nullable();
          $table->integer('module_id')->unsigned();
          $table->integer('enrolment_id')->unsigned();
          $table->timestamps();

          $table->foreign('bank_id')->references('id')->on('banks');
          $table->foreign('module_id')->references('id')->on('modules');
          $table->foreign('enrolment_id')->references('id')->on('enrolments');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

      Schema::dropIfExists('courses');
      Schema::dropIfExists('students');
      Schema::dropIfExists('groups');
      Schema::dropIfExists('modules');
      Schema::dropIfExists('banks');
      Schema::dropIfExists('payments');
      Schema::dropIfExists('enrolments');
    }
}
