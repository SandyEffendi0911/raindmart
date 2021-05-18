<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMenuSubItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_menu_sub_item', function (Blueprint $table) {
            $table->id();
            $table->string('kd_sub_item');
            $table->string('fk_group_menu');
            $table->string('menu_sub_item_nama');
            $table->string('menu_sub_item_link');
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
        Schema::dropIfExists('tb_menu_sub_item');
    }
}
