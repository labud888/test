<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobFormRequest;
use App\Job;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\User;

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

                        $data = [ 'senderMessage' => 'Message'];

                        $moderator = User::where('name','moderator')->first();

		$event = $job->where('email', $request->email)->first();

		if ($event) {
			$event->update($request->except('_token'));
			Session::flash('success', 'Your job offer now is updated!');

		} else {

			Mail::send('emails.manager', ['title' => $request->title ,'description' =>'Your submission is in moderation, give us a couple of hours for a response'] , function ($m) use ($request) {

				$m->from( config('constants.SERVER_EMAIL') , 'Story');
				$m->replyTo( config('constants.SERVER_EMAIL') );
				$m->subject('Your job offer');
				$m->to($request->email);
			});
			Mail::send('emails.moderator',  ['title' => $request->title ,'description' => $request->description] , function ($m) use ($moderator) {
				$m->from( config('constants.SERVER_EMAIL') , 'Story');
				$m->replyTo( config('constants.SERVER_EMAIL') );
				$m->subject('New job offer');
				$m->to( $moderator->email);
			});

			$job->create($request->except('_token'));
			Session::flash('success', 'Your submission is in moderation, give us a couple of hours for a response!');
		}

		return redirect()->back();

	}
}
