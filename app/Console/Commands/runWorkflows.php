<?php

namespace App\Console\Commands;

use App\classes\Steps;
use DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class runWorkflows extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'workflow:run {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $id = $this->argument('id');
        $steps = json_decode(Storage::get('/workflows/'.$id.'.json'))[0];
        $i = 0;
        $response[0] = '';
        DB::table('queu')->where('id', '3')->update(['status' => 'running']);
        foreach ($steps as $step) {
            //var_dump($step);

            $funtion = key($step);
            $response[$i] = Steps::$funtion($step, $response);
            var_dump($response[$i]);
            $i++;
        }
        DB::table('queu')->where('id', '4')->update(['status' => 'stopped']);

        return $response;
    }
}
