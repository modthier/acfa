<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainerTranslations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainer_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('trainer_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->string('slug')->unique();
            $table->text('bio');
            $table->text('work_experience');

            $table->unique(['trainer_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainer_translations');
    }
}
