<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobAplicTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('job_aplic', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title', 100)->nullable();
			$table->string('email', 255)->nullable();
			$table->mediumText('description')->nullable();
			$table->boolean('status')->default(2);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('job_aplic');
	}
}
