<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketplaceController extends Controller
{
  public function home(){
    return view('marketplace.home');
  }
  public function view(){
    return view('marketplace.view');
  }
}
