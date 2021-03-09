<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectUnitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_unit', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->integer('unit_id');
            $table->integer('floor_id');
            $table->integer('block_id');
            $table->integer('unit_type_id');
            $table->string('flat_name');
            $table->integer('base_rate');
            $table->integer('saleable_area');
            $table->integer('chargeable_area');
            $table->integer('gst_applicable');
            $table->integer('gst_present');
            $table->integer('status_id');
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
        Schema::dropIfExists('project_unit');
    }
}
