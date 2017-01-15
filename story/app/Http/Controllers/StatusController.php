<?php

namespace App\Http\Controllers;

use App\Job;
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

		$jobs = $job->where('id', $request->id)->first();
		$jobs->status = $request->status;
		$jobs->save();

		if ($request->status == 1) {

			$message = 'Applicant with this email [ ' . $jobs->email . ' ] is approved!';
			$status = 'success';
			$subject = 'Approved';
		} else if ($request->status == 3) {

			$message = 'Applicant with this email [ ' . $jobs->email . ' ] is rejected!';
			$status = 'warning';
			$subject = 'Rejected';
		} else {
			$message = 'Currently our system is not available, please try again in a few minutes!';
			$status = 'warning';
			$subject = 'Waiting';
		}
		Mail::send('emails.manager-response', ['title' => $message], function ($m) use ($jobs, $subject) {
			$m->from(config('constants.SERVER_EMAIL'), 'Story');
			$m->replyTo(config('constants.SERVER_EMAIL'));
			$m->subject($subject);
			$m->to($jobs->email);
		});

		Session::flash($status, $message);
		return redirect()->action('DashboardController@index');
	}
}
