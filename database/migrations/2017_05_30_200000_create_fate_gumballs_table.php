<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFateGumballsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fate_gumballs', function (Blueprint $table) {
            $table->integer('fate_id')->unsigned()->index();
            $table->foreign('fate_id')->references('id')->on('fates')->onDelete('cascade');
            $table->integer('gumball_id')->unsigned()->index();
            $table->foreign('gumball_id')->references('id')->on('gumballs')->onDelete('cascade');
            $table->unique(['fate_id', 'gumball_id']);
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
        Schema::dropIfExists('fate_gumballs');
    }
}
