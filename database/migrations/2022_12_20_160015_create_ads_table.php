<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdsTable extends Migration {

	public function up()
	{
		Schema::create('ads', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 255);
			$table->text('description');
			$table->enum('type', array('free', 'paid'));
			$table->integer('category_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->date('start_date');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ads');
	}
}
