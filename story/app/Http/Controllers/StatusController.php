<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class StatusController extends Controller {
	/**
	 * Show the application status.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request, Job $job) {

		$jobs = $job->find($request->id)->first();
		$jobs->status = $request->status;
		$jobs->save();

		$moderator = User::where('name', 'moderator')->first();

		if ($request->status == 1) {

			$message = 'Applicant with this email [ ' . $jobs->email . ' ] is approved!';
			$status = 'success';

		} else if ($request->status == 3) {

			$message = 'Applicant with this email [ ' . $jobs->email . ' ] is rejected!';
			$status = 'warning';

		} else {
			$message = 'Currently our system is not available, please try again in a few minutes!';
			$status = 'warning';
		}
		Mail::send('emails.manager-response', ['title' => $message], function ($m) use ($moderator) {
			$m->from(config('constants.SERVER_EMAIL'), 'Story');
			$m->replyTo(config('constants.SERVER_EMAIL'));
			$m->subject('Job application');
			$m->to($moderator->email);
		});

		Session::flash($status, $message);
		return redirect()->action('DashboardController@index');
	}
}
