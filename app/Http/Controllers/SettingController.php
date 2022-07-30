<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
  public function list(){
    return view('settings.list');
  }
  public function new(){
    return view('settings.new');
  }
  public function edit(){
    return view('settings.edit');
  }
  public function save(){
    return back();
  }
}
