<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('level')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('alias')->nullable();
            $table->string('route')->nullable();
            $table->string('icon')->nullable();
            $table->string('package')->nullable();
            $table->string('navbar')->nullable();
            $table->tinyInteger('sort_order')->default(0);
            $table->boolean('live')->default(true);
            $table->foreign('parent_id')->references('id')->on('menus');
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
        Schema::dropIfExists('menus');
    }
}
