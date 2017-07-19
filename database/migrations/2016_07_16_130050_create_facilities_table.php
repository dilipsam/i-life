<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        //(water source, school, anganwadi, ANM,
        //ASHA, hospital/PHC, road access, availability of local provision store, 
        //housing and toilet facility)
            
        DB::table('facilities')->insert(array('name' => 'Hospital'));
        DB::table('facilities')->insert(array('name' => 'Water Source'));
        DB::table('facilities')->insert(array('name' => 'School'));
        DB::table('facilities')->insert(array('name' => 'ANM'));
        DB::table('facilities')->insert(array('name' => 'ASHA'));
        DB::table('facilities')->insert(array('name' => 'Hospital'));
        DB::table('facilities')->insert(array('name' => 'PHC'));
        DB::table('facilities')->insert(array('name' => 'Road Access'));
        DB::table('facilities')->insert(array('name' => 'Local Provision Store'));
        DB::table('facilities')->insert(array('name' => 'Housing'));
        DB::table('facilities')->insert(array('name' => 'Toilet'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('facilities');
    }
}
