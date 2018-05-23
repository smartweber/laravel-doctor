<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('transactions', function(Blueprint $table)
			{
				$table->engine = 'InnoDB';
	            $table->increments('id');          
	            $table->string('name', 65);
				$table->string('payee', 25);
				$table->string('beneficiary', 35);
				$table->string('transactiontype', 25);
				$table->string('transactionvalue',35);
				$table->string('currency', 25);
				$table->string('datesent', 25);
				$table->string('datereceived', 25);
				$table->longtext('description');
				$table->string('transactionnumber', 25);

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
		Schema::drop('transactions');
	}

}
