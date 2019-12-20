<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourceMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('source_materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('path');
            $table->text('description')->nullable();
            $table->bigInteger('size')->default(0);
            $table->unsignedBigInteger('source_material_type_id');
            $table->foreign('source_material_type_id')->references('id')->on('source_material_types');
            $table->unsignedBigInteger('source_material_subtype_id')->nullable();
            $table->foreign('source_material_subtype_id')->references('id')->on('source_material_subtypes');
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
        Schema::dropIfExists('source_materials');
    }
}
