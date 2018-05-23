<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('events', function(Blueprint $table)
			{
				$table->engine = 'InnoDB';
	            $table->increments('id');          
	            $table->string('name', 65);
				$table->string('startdate', 25);
				$table->longtext('description');
				$table->string('enddate', 25);

				$table->rememberToken();
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
		//
		Schema::drop('events');
	}

}
