<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrowthCharts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->date('date_of_entry');
            
            $table->integer('child_id')->unsigned();
            
            $table->integer('height')->unsigned();
            $table->integer('weight')->unsigned();
            $table->integer('head_circum')->unsigned();
            
            $table->text('remarks_one')->nullable();
            $table->text('remarks_two')->nullable();
            
            $table->foreign('child_id')
                    ->references('id')
                    ->on('children')
                    ->onDelete('cascade');
            
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
        Schema::drop('charts');
    }
}
