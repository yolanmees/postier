<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function list(){
      return view('apps.list');
    }
    public function new(){
      return view('apps.new');
    }
    public function add(){
      return view('apps.add');
    }
    public function edit(){
      return view('apps.edit');
    }
    public function save(){
      return back();
    }

}
