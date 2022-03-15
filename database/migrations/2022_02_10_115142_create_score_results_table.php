<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_results', function (Blueprint $table) {
            $table->id();
            $table->string('cert_name');
            $table->string('candidate_name');
            $table->string('candidate_number');
            $table->string('center_number');
            $table->date('test_date');
            $table->integer('overall');
            $table->integer('listening');
            $table->integer('reading');
            $table->integer('writing');
            $table->integer('speaking');
            $table->text('comment');
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
        Schema::dropIfExists('score_results');
    }
}
