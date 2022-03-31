<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footersettings', function (Blueprint $table) {
            $table->id();
            $table->string('footer_style')->default('default');
            $table->string('text_color');
            $table->string('background_color');
            $table->string('left_margin');
            $table->string('right_margin');
            $table->string('container');
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
        Schema::dropIfExists('footersettings');
    }
}
