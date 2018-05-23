<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
			{
				$table->engine = 'InnoDB';
	            $table->increments('id');          
	            $table->string('first', 25);
				$table->string('last', 25);
				$table->string('password', 65);
				$table->string('permission', 20);
				$table->string('email', 30);
				$table->string('birthday',30);
				$table->string('country', 30);
				$table->string('token', 255);
				$table->boolean('published');
				$table->datetime('created_at');
				$table->datetime('updated_at');
			    $table->rememberToken();
			});

			DB::table('users')->insert(
				array(	
						array(	'published' => 1, 
								'first'=> 'liu',                               
								'last'=> 'yunfei',   
								'password'=> Hash::make('password'), 
								'permission'=> 'administrator', 
								'email'=> 'liu.yunfei678@gmail.com',
								'created_at'=> $date = date('Y-m-d H:i:s')), 
								
				));

			DB::table('users')->insert(
				array(	
						array(	'published' => 1, 
								'first'=> 'user',                               
								'last'=> 'user',   
								'password'=> Hash::make('password'), 
								'permission'=> 'user', 
								'email'=> 'user@gmail.com',
								'created_at'=> $date = date('Y-m-d H:i:s')), 
								
				));
	}	

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
