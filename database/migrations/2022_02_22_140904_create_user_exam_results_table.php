<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserExamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_exam_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')
            ->on('users')->onDelete('cascade');
            $table->foreignId('exam_id')->references('id')
            ->on('exams')->onDelete('cascade');
            $table->integer('score');
            $table->tinyInteger('status')->default(0);
            $table->date('retake_date');
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
        Schema::dropIfExists('user_exam_results');
    }
}
