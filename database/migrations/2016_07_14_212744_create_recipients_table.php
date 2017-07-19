<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipientsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('recipients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name_husband');
            $table->string('name_wife');
            $table->tinyInteger('num_children');
            $table->date('date_of_delivery');

            $table->string('sources_income');
            $table->integer('annual_income')->unsigned();

            $table->string('address_first_line');
            $table->string('address_second_line')->nullable();
            $table->string('address_village_name');
            $table->string('address_town');

            $table->string('bank_account_number');
            $table->string('bank_name');
            $table->string('bank_branch_name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('recipients');
    }

}
