<?php

namespace App\Mail;

use App\Answer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerInfo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $answers = new Answer();
        return $this->subject("Question Answers Info")->view('email')
            ->with([
                'answer_count' => $answers->countAnswersByLast48Hours(),
                'answers' => $answers->getLast5Answers()
            ]);
    }
}
