<?php

namespace App\Console;

use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        // $tasks = DB::table('tasks')->get();
        // $id = [];
        //foreach ($tasks as $task) {
          //$frequency = $task->frequency;
          //$schedule->exec("/Applications/MAMP/bin/php/php7.1.6/bin/php /Applications/MAMP/htdocs/postier/artisan $task->function")
                    //->$frequency()
                    //->before(function () {
                      //  DB::table('queu')->insert(array('name' => $task->name, 'function' => $task->function, 'status' => 'pending' ));
                    //});
                    // ->after(function () {
                    //   DB::table('queu')->where('id', $id[$task->name])->update(array('status' => 'stopped'));
                    //  })
                    // ->runInBackground()
                    // ->appendOutputTo('test.txt');
                   //  ->before(function () {
                   //    DB::table('queu')->where('id', $id[$task->name])->update(['status' => 'running']);
                   //    })
                  //  ;
        //}
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
