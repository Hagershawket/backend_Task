<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdTagTable extends Migration {

	public function up()
	{
		Schema::create('ad_tag', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('ad_id')->unsigned();
			$table->integer('tag_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('ad_tag');
	}
}