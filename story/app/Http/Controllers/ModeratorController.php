<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class ModeratorController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Requests $request, Job $job) {
		//$conf = config('constants.ADMIN_EMAIL');
		$user = $request->user();
		if($user->name === 'moderator'){
dd($user)
		}
		$jobs = $job->where('status', 2)->get();
		return view('dashboard')->with(compact('jobs', 'conf'));
	}
}
