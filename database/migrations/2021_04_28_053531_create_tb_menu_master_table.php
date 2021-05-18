<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMenuMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_menu_master', function (Blueprint $table) {
            $table->id();
            $table->string('kd_master_menu')->unique();
            $table->string('master_menu_title');
            $table->string('master_menu_link')->nullable();
            $table->string('master_menu_icon');    
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
        Schema::dropIfExists('tb_menu_master');
    }
}
