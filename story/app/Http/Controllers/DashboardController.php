<?php

namespace App\Http\Controllers;

use App\Job;

class DashboardController extends Controller {
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Job $job) {

		$jobs = $job->where('status', '=', 1)->get();

		return view('dashboard')->with(compact('jobs'));

	}
}
