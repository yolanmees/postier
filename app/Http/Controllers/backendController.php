<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class backendController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function settings()
  {
      return view('backend.settings.settings', ['title' => 'Settings']);
  }

  public function roles()
  {
      return view('backend.settings.roles', ['title' => 'Roles and permissions']);
  }

}
