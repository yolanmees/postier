<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkflowController extends Controller
{
  public function list(){
    return view('workflows.list');
  }
  public function new(){
    return view('workflows.new');
  }
  public function edit(){
    return view('workflows.edit');
  }
  public function save(){
    return back();
  }
}
