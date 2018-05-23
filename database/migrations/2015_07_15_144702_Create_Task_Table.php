<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('tasks', function(Blueprint $table)
			{
				$table->engine = 'InnoDB';
	            $table->increments('id');          
	            $table->string('name', 65);
				$table->string('assignedto', 25);
				$table->string('completed', 35);
				$table->string('startdate', 25);
				$table->longtext('description');
				$table->string('targetcompletiondate', 25);
				$table->string('notes', 25);
				$table->string('completiondate', 25);
				$table->string('priority', 25);
				$table->string('nexttask', 25);

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
		Schema::drop('tasks');
	}

}
