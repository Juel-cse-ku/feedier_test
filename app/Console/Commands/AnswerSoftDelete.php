<?php

namespace App\Console\Commands;

use App\Answer;
use Illuminate\Console\Command;

class AnswerSoftDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:answerSoftDelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Soft Delete empty value answers on every 24 hours.';

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
     * @return void
     */
    public function handle()
    {
        Answer::where('name', '')
            ->where('created_at', '>=', date('Y-m-d H:i:s', strtotime("-24 hours")))
            ->delete();
    }
}
