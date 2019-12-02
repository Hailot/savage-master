<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spells', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('classes');
            $table->string('source')->nullable();
            $table->integer('level');
            $table->unsignedBigInteger('school_id');
            $table->string('casting_time');
            $table->string('range');
            $table->string('components');
            $table->string('duration');
            $table->tinyInteger('ritual');
            $table->text('description')->nullable();
            $table->string('pic')->nullable();
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('spell_schools');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spells');
    }
}
