<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model {
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'job_aplic';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title', 'email', 'description', 'status',
	];
}
