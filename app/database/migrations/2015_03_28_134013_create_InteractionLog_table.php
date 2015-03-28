<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteractionLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('InteractionLog', function(Blueprint $table)
		{
			$table->increments('id');
			$table->bigInteger('ApplicantId');
			$table->bigInteger('InteractionTypeId');
			$table->dateTime('DateTime');
			$table->longText('Remarks');
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
		Schema::drop('InteractionLog');
	}

}
