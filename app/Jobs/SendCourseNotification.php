<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\NewCourseSubForStudent;
use App\Mail\NewCourseSubForTrainer;
use App\Mail\NewSub;
use Mail;

class SendCourseNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sub = $this->details['event'];
        $student = new NewCourseSubForStudent();
        $trainer = new NewCourseSubForTrainer($sub);
        $management = new NewSub($sub);
        Mail::to($sub->user->email)->send($student);
        Mail::to($sub->subscriptionable->trainer->email)->send($trainer);
        Mail::to("muddathir.samir@gmail.com")->send($management);
    }
}
