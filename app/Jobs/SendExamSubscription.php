<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ExamRequestMail;
use App\Mail\StudentExamRequestMail;
use Mail;

class SendExamSubscription implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      
        $management = new ExamRequestMail($this->data);
        $student = new StudentExamRequestMail($this->data);
        //Mail::to($this->data->user->email)->send($student);
        Mail::to("mod47387@gmail.com")->send($management);
    }
}
