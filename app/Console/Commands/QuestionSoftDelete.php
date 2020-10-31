<?php

namespace App\Console\Commands;

use App\Question;
use Illuminate\Console\Command;

class QuestionSoftDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:QuestionSoftDelete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Soft delete unanswered  question on every 24 hours.';

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
        return Question::doesntHave('answers')
            ->where('created_at', '>=', date('Y-m-d H:i:s', strtotime("-24 hours")))
            ->delete();
    }
}
