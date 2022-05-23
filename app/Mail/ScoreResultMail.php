<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ScoreResult;

class ScoreResultMail extends Mailable
{
    use Queueable, SerializesModels;
    public $scoreResult;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ScoreResult $scoreResult)
    {
        $this->scoreResult = $scoreResult;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Test Score Results')->view('mail.score.new');
    }
}
