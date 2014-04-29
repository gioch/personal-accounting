<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('month_info', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('year');
			$table->integer('month');
			$table->double('possible_charge');
			$table->double('actual_charge');
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
		Schema::drop('month_info');
	}

}
