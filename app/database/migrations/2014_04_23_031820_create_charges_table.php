<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('charges', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('month_info_id');
			$table->integer('day');
			$table->text('title');
			$table->double('amount');
			$table->integer('family_member_id');
			$table->integer('category_id');
			$table->integer('priority_id');
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
		Schema::drop('charges');
	}

}
