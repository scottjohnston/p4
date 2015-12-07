<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EscapeController extends Controller
{
    public function getCreate(Request $request)
    {
        $escapes = \App\Escape::all();
        return view('escapes.create')->with('escapes', $escapes->toArray());
    }


    public function postCreate(Request $request)
    {

      //create a new escape in the database
      $escape = new \App\Escape();
      $escape->name = $request->name;
      $escape->description = $request->description;
      $escape->url = $request->url;
      $escape->cost = $request->cost;

      $escape->save();


      $escapes = \App\Escape::all();
      return view('escapes.create')->with('escapes', $escapes->toArray());
    }


    public function getUpdate($id)
    {
      $escape = \App\Escape::where('id', '=', $id)->get();

      return view('escapes.update')->with('escape', $escape->toArray());
    }



    public function postUpdate(Request $request)
    {
      $escape = new \App\Escape();
      $escape = \App\Escape::where('id', '=', $request->id)
         ->update([
         'name'=>$request->name,
         'description'=>$request->description,
         'url'=>$request->url,
         'cost'=>$request->cost
         ]);

      $escapes = \App\Escape::all();

      return view('escapes.create')->with('escapes', $escapes->toArray());
    }


    public function getDelete($id)
    {
      $escapes = new \App\Escape();
      $escapeToDelete = $escapes->find($id);
      $escapeToDelete->delete();

      $escapes = \App\Escape::all();

      return view('escapes.create')->with('escapes', $escapes->toArray());
   }

}
