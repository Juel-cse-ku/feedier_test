<?php

namespace App\Console;

use App\Console\Commands\AnswerInfoEmailJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//         $schedule->command('job:answerInfoEmailSend')->cron('0 8 */2 * *');
//         $schedule->command('command:QuestionSoftDelete')->daily();

        $schedule->job(new AnswerInfoEmailJob)->everyFiveMinutes();
        $schedule->call(function () {
            DB::table('test_tbl')->insert([
                'date_time' => date('Y-m-d H:i:s')
            ]);
        })->everyTwoMinutes();

//        $schedule->job(new AnswerInfoEmailJob)->cron('0 8 */2 * *');
//        $schedule->command('command:QuestionSoftDelete')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
