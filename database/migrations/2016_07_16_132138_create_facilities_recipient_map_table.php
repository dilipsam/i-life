<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesRecipientMapTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('facility_recipient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipient_id')->unsigned();
            $table->integer('facility_id')->unsigned();
            $table->foreign('recipient_id')
                    ->references('id')
                    ->on('recipients')
                    ->onDelete('cascade');
            $table->foreign('facility_id')
                    ->references('id')
                    ->on('facilities')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('facility_recipient');
    }

}
