<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobFormRequest;
use App\Job;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class JobController extends Controller {
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('job');
	}
	public function save(JobFormRequest $request, Job $job) {

		$event = $job->where('email', $request->email)->first();

		if ($event) {
			$event->update($request->except('_token'));
			Session::flash('success', 'Your job application now is updated!');

		} else {

			$new_applic = $job->create($request->except('_token'));
			$moderator = User::where('name', 'moderator')->first();

			Mail::send('emails.manager', ['title' => $request->title, 'description' => 'Your submission is in moderation, waiting for final approval!'], function ($m) use ($request) {
				$m->from(config('constants.SERVER_EMAIL'), 'Story');
				$m->replyTo(config('constants.SERVER_EMAIL'));
				$m->subject('Your job application');
				$m->to($request->email);
			});
			Mail::send('emails.moderator', ['title' => $request->title, 'email' => $request->email, 'description' => $request->description, 'id' => $new_applic->id], function ($m) use ($moderator) {
				$m->from(config('constants.SERVER_EMAIL'), 'Story');
				$m->replyTo(config('constants.SERVER_EMAIL'));
				$m->subject('New job applicant');
				$m->to($moderator->email);
			});
			Session::flash('success', 'Your submission is in moderation, waiting for final approval!');
		}

		return redirect()->back();

	}
}
