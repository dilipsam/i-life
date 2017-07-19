<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorFamiliesMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors_recipients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipient_id')->unsigned();
            $table->integer('donor_id')->unsigned();
            $table->boolean('is_active')->default(true);
            
            $table->foreign('recipient_id')
                    ->references('id')
                    ->on('recipients')
                    ->onDelete('cascade');
            
            $table->foreign('donor_id')
                    ->references('id')
                    ->on('donors')
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
        Schema::drop('donors_recipients');
    }
}
