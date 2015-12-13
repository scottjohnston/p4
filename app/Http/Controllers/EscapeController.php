<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EscapeController extends Controller
{
    public function postAddEscape(Request $request)
    {
        $holidayToUpdate = \App\Holiday::where('id', '=', $request->id)
                                 ->get();



        $escapes = \App\Escape::all();
        return view('escapes.create')
               ->with('holidayToUpdate', $holidayToUpdate)
               ->with('escapes', $escapes->toArray())
               ->with('request', $request);
    }


    public function postCreate(Request $request)
    {
       $holiday = \App\Holiday::find('10');//->toArray();//::where('id', '=', $request->holiday_id)->get();

      //create a new escape in the database
      $escape = new \App\Escape();
      $escape->name = $request->name;
      $escape->description = $request->description;
      $escape->url = $request->url;
      $escape->cost = $request->cost;

      $escape->save();

      $escapes = \App\Escape::where('holiday_id', '=', '16');//at first glance this works

      $escape->holidays()->sync(['16']);//this is the go
      //$holiday->escapes()->sync(['16']);

      $all_escapes = \App\Escape::with('holidays')->where('id', '=', '10')->get();//where('holiday_id', '=', '10');

      return view('escapes.create')->with('escapes', $all_escapes->toArray());//this works ->pluck('id')
                                    //->with('holiday', $all_escapes);
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
