<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ApplicantSkills', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('ApplicantId');
			$table->bigInteger('SkillsetPoolId');
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
		Schema::drop('ApplicantSkills');
	}

}