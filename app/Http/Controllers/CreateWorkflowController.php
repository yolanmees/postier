<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\Support\Facades\Storage;

class CreateWorkflowController extends Controller
{
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    public static function initWorkflowDB(){
      if(!empty($_POST['name'])){
        $name = $_POST['name'];
        $name_id = strtolower(str_replace(" ", "_", $name));
        $send = DB::table('workflows')->insertGetId( array(
          'name' => $name,
          'name_id' => $name_id,
          'triggerBy' => "Cron"
        ));
        $schedule = app(Schedule::class);
        $schedule->command('test:test')->everyMinute();
        $contents = "[{}]";
        Storage::put("/workflows/$send.json", $contents);
        echo '<meta http-equiv="refresh" content="0;url=/workflows/new?s=200&n='.$send.'" />';
      }else{
        echo '<meta http-equiv="refresh" content="0;url=/workflows/new?s=500" />';
      }
    }

    public static function findRequest(Request $request){
      $requests = DB::table('request')->where('collection_id', '=', $request->id)->get();
      $html = '<table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                  </tr>
                </thead>
                <tbody>';
      foreach ($requests as $request) {
        $html .= '<tr>
                    <td>'.$request->name.'</td>
                  </tr>';



        //var_dump($request);
      }
      $html .= '</tbody></table>';
      return $html;
    }

}
