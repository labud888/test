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
		//$conf = config('constants.ADMIN_EMAIL');
		$jobs = $job->where('status', 2)->get();
		return view('dashboard')->with(compact('jobs', 'conf'));
	}
}
