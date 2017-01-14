<?php

namespace App;

use App\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobPost extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The job instance.
     *
     * @var Job
     */
    protected $job;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('auth.emails.moderator')
                    ->with([
                        'jobTItle' => $this->job->title,
                        'jobDescription' => $this->job->description,
                        'userEmail' => $this->job->email,
                    ]);
    }
}