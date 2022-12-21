<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('ads', function(Blueprint $table) {
			$table->foreign('category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ads', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ad_tag', function(Blueprint $table) {
			$table->foreign('ad_id')->references('id')->on('ads')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('ad_tag', function(Blueprint $table) {
			$table->foreign('tag_id')->references('id')->on('tags')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('ads', function(Blueprint $table) {
			$table->dropForeign('ads_category_id_foreign');
		});
		Schema::table('ads', function(Blueprint $table) {
			$table->dropForeign('ads_user_id_foreign');
		});
		Schema::table('ad_tag', function(Blueprint $table) {
			$table->dropForeign('ad_tag_ad_id_foreign');
		});
		Schema::table('ad_tag', function(Blueprint $table) {
			$table->dropForeign('ad_tag_tag_id_foreign');
		});
	}
}