<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('organisations', function(Blueprint $table)
			{
				$table->engine = 'InnoDB';
	            $table->increments('id');          
	            $table->string('name', 65);
				$table->string('type', 25);
				$table->string('jurisdiction', 25);
				$table->string('registrationcountry', 25);
				$table->string('registrationcity', 65);
				$table->string('openeddate',30);
				$table->string('dateofincorporation', 65);
				$table->string('contactphone', 65);
				$table->string('closeddate', 65);
				$table->string('sector', 65);
				$table->string('industry', 65);
				$table->longtext('description');
				$table->string('floororname', 65);
 
				$table->string('email', 65);
				$table->string('fax', 25);
				$table->longtext('website');
				$table->string('addressname', 25);
				$table->string('country', 25);
				$table->string('province', 65);
				$table->string('cityortown',30);
				$table->string('pobox', 65);
				$table->string('district', 65);

				$table->string('roadnumber', 65);
				$table->string('roadname',30);
				$table->string('roadtype', 65);
				$table->string('additionalroadvalue', 65);

				$table->string('complexname', 65);
				$table->string('buildingnameornumber', 25);
				$table->string('floororlevel', 25);
				$table->string('roomorunitorsuite', 25);
				$table->string('postalcode', 65);
				$table->string('latitude',30);
				$table->string('longitude', 65);

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
		Schema::drop('organisations');
	}

}
