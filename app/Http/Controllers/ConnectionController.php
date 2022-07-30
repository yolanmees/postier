<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnectionController extends Controller
{
  public function list(){
    return view('connections.list');
  }
  public function new(){
    return view('connections.new');
  }
  public function edit(){
    return view('connections.edit');
  }
  public function save(){
    return back();
  }
}
