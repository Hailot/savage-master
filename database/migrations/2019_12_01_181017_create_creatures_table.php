<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creatures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('sub_type_id')->nullable();
            $table->string('languages')->nullable();
            $table->string('size');
            $table->string('speed');
            $table->string('challenge_rating');
            $table->integer('average_hitpoints');
            $table->string('hitpoint_dice');
            $table->integer('armor_class');
            $table->string('alignment')->nullable();
            $table->string('source')->nullable();
            $table->text('skills')->nullable();
            $table->text('senses')->nullable();
            $table->text('saving_throws')->nullable();
            $table->text('damage_vulnerabilities')->nullable();
            $table->text('damage_resistances')->nullable('');
            $table->text('damage_immunities')->nullable();
            $table->text('condition_immunities')->nullable();
            $table->text('legendary_actions')->nullable();
            $table->text('special_abilities')->nullable();
            $table->text('attacks')->nullable();
            $table->integer('strength');
            $table->integer('dexterity');
            $table->integer('constitution');
            $table->integer('intelligence');
            $table->integer('wisdom');
            $table->integer('charisma');
            $table->string('pic')->nullable();
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('creature_types')->onDelete('cascade');
            $table->foreign('sub_type_id')->references('id')->on('creature_sub_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('creatures');
    }
}
