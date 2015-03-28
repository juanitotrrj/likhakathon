<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Applicant', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('Firstname', 32);
			$table->string('Lastname', 32);
			$table->string('Midname', 32);
			$table->date('Birthdate');
			$table->string('Address', 32);
			$table->string('City', 32);
			$table->string('State', 32);
			$table->string('Country', 32);
			$table->string('ContactNumber', 32);
			$table->string('EmailAddress', 32);
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
		Schema::drop('Applicant');
	}

}
