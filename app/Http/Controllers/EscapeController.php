<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EscapeController extends Controller
{

   /*
    *
    *
    */
    public function getAddEscape($id)
    {
        $holidayToUpdate = \App\Holiday::with('escapes')
                           ->where('id', '=', $id)->get();

        return view('escapes.create')
               ->with('holidayToUpdate', $holidayToUpdate);
    }


    public function postCreate(Request $request)
    {

      $this->validate(
            $request,
            [
                 'name' => 'required|min:5',
                 'description' => 'required|min:5|max:256',
                 'url' => 'required|url',
                 'cost'=>'required|numeric',
            ]
        );

       $holiday = \App\Holiday::find($request->id);//->toArray();//::where('id', '=', $request->holiday_id)->get();

      //create a new escape in the database
      $escape = new \App\Escape();
      $escape->name = $request->name;
      $escape->description = $request->description;
      $escape->url = $request->url;
      $escape->cost = $request->cost;

      $escape->save();

      $escapes = \App\Escape::where('id', '=', $request->holiday_id);//at first glance this works

      $escape->holidays()->sync([$request->holiday_id]);//this is the go
      //$holiday->escapes()->sync(['16']);
      //$all_escapes = \App\Escape::where('id', '=', '1')->get();//where('holiday_id', '=', '10');
      //return back()->with('request_id', $request->holiday_id);//this works ->pluck('id')
                                    //->with('holiday', $all_escapes);

      $holidayToUpdate = \App\Holiday::with('escapes')
                         ->where('id', '=', $request->holiday_id)->get();

      return view('escapes.create')
             ->with('holidayToUpdate', $holidayToUpdate)
             ->with('request', $request);
    }



    public function getUpdate($id)
    {
      $escape = \App\Escape::where('id', '=', $id)->get();

      return view('escapes.update')->with('escape', $escape->toArray());
    }

    /* postUpdate sends the form data to the data base
    *
    *
    */

    public function postUpdate(Request $request)
    {
         $this->validate(
               $request,
               [
                    'name' => 'required|min:5',
                    'description' => 'required|min:5|max:256',
                    'url' => 'required|url',
                    'cost'=>'required|numeric',
               ]
           );

              dump($request->url);

      $escape = new \App\Escape();
      $escape = \App\Escape::where('id', '=', $request->id)
         ->update([
         'name'=>$request->name,
         'description'=>$request->description,
         'url'=>$request->url,
         'cost'=>$request->cost
         ]);

      $escapes = \App\Escape::where('id', '=', $request->id)->get();

      return view('escapes.update')->with('escape', $escapes);
    }


    /****************************************
      Delete escape
      ***************************************/



    public function postDeleteForm(Request $request)
    {
      $holiday_id = $request->holiday_id;
      $escape = \App\Escape::where('id', '=', $request->id)->get();

      return view('escapes.delete')
                  ->with('escape', $escape)
                  ->with('holiday_id', $holiday_id);
    }




    public function postDelete(Request $request)
    {
      $holiday = \App\Holiday::find($request->holiday_id);
      //$escapes = new \App\Escape();
      $escapeToDelete = \App\Escape::find($request->id);

      $holiday->escapes()->detach($request->id);
      $escapeToDelete->delete();

      $holidayWithEscapes = \App\Holiday::with('escapes')
                          ->where('id', '=', $request->holiday_id)->get();

      return view('escapes.create')
             ->with('holidayToUpdate', $holidayWithEscapes);
   }
















}
