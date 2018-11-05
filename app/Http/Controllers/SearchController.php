<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
  public function index()
  {
    return view('search.search');
  }


  public function searchCollections(Request $request)
  {
    if($request->ajax())
    {

    $output="";
    $searches=DB::table('collection')->where('name','LIKE','%'.$request->search."%")->get();

    if($searches)
    {
      foreach ($searches as $key => $search) {
        $output.='<tr>'.
        '<td>'.$search->name.'</td>'.
        '<td>'.$search->description.'</td>'.
        '<td><button class="btn btn-primary" id="'.$search->id.'">Select</button></td>'.
        '</tr>';
      }
    }
    else
    {
      $output.='<tr>'.
      '<td colspan="3"> No items found</td>'.
      '</tr>';
    }
    
  }
  else
  {
    $output.='<tr>'.
    '<td colspan="3"> No items found</td>'.
    '</tr>';
  }

  return Response($output);


  }
}
