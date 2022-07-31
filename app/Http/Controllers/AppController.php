<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App;

class AppController extends Controller
{
    public function list(){
      $apps = App::get();

      return view('apps.list', compact('apps'));
    }
    public function new(){
      return view('apps.new');
    }
    public function add(){
      return view('apps.add');
    }
    public function create(Request $request){
      $app = new App;

      $app->app_name = $request->app_name;
      $app->app_title = $request->app_name;
      $app->app_version = '0';
      $app->app_type = '0';
      $app->app_description = $request->app_description;

      $app->save();

      return redirect()->route('apps.list');
    }
    public function import(){
      return view('apps.import');
    }
    public function edit($id){
      $app = App::find($id);
      return view('apps.edit', compact('app'));
    }
    public function save(){
      return back();
    }

}
