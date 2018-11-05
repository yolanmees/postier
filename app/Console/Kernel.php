<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
       'App\Console\Commands\testCommand',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('test:test')->everyMinute();
        // $schedule->command('inspire')
        //          ->hourly();
        $tasks = DB::table('tasks')->get();
        foreach ($tasks as $task) {
          $frequency = $task->frequency;
          $schedule->command('test:test')->everyMinute()->runInBackground()->appendOutputTo('test.txt');
          $schedule->command("$task->function")->everyMinute()->runInBackground()->appendOutputTo('test.txt');
        }
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
