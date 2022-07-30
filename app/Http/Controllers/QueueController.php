<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueueController extends Controller
{
  public function list(){
    return view('queue.list');
  }
  public function new(){
    return view('queue.new');
  }
  public function edit(){
    return view('queue.edit');
  }
  public function save(){
    return back();
  }
}
