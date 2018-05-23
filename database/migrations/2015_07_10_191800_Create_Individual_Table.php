<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('individuals', function(Blueprint $table)
			{
				$table->engine = 'InnoDB';
	            $table->increments('id');          
	            $table->string('formalsuffix', 65);
				$table->string('firstname', 25);
				$table->string('middlename', 25);
				$table->string('familyname', 25);
				$table->string('familynamesuffix', 65);
				$table->string('preferredname',30);
				$table->string('endnamesuffix', 65);
				$table->string('gender', 65);

				$table->string('dateofbirth', 65);
				$table->string('age', 25);
				$table->string('countryofbirth', 25);
				$table->string('cityofbirth', 25);
				$table->string('nationality', 65);
				$table->string('dateofdeath',30);
				$table->string('idtype', 65);
				$table->string('idnumber', 65);

				$table->string('phonetype', 65);
				$table->string('phonenumber', 25);
				$table->string('emailtype', 25);
				$table->string('socialmediatype', 65);
				$table->string('socialmediaid',30);
				$table->string('addressname', 65);
				$table->string('country', 65);

				$table->string('province', 65);
				$table->string('cityortown', 65);
				$table->string('pobox', 65);
				$table->string('emailaddress', 25)->unique();
				$table->string('district', 25);
				$table->string('roadnumber', 65);
				$table->string('roadname',30);
				$table->string('roadtype', 65);
				$table->string('additionalroadvalue', 65);

				$table->string('complexname', 65);
				$table->string('buildingnameornumber', 25);
				$table->string('floororname', 25);
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
		Schema::drop('individuals');
	}

}
