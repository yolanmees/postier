<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
  public function list(){
    return view('reports.list');
  }
  public function new(){
    return view('reports.new');
  }
  public function edit(){
    return view('reports.edit');
  }
  public function save(){
    return back();
  }
}
