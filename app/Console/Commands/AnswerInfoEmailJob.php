<?php

namespace App\Console\Commands;

use App\Mail\AnswerInfo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AnswerInfoEmailJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:answerInfoEmailSend';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to app admin after every 2 days at 8 am UTC.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Mail::to('app.answerinfo@gmail.com')->send(new AnswerInfo());
    }
}
