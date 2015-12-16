<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
   public function getCreate()
   {
      $logged_in_user = \Auth::user();//get the current user that is authenticated
      $holidays = \App\Holiday::where('user_id', '=', $logged_in_user->id)->get();//find their hollidays

      return view('holidays.create')->with('holidays', $holidays);
   }



   public function postCreate(Request $request)
   {
      $holiday = new \App\Holiday();//create a new holiday object
      $logged_in_user = \Auth::user();//get the current user that is authenticated


      $holiday->name = $request->name;
      $holiday->description = $request->description;
      //$holiday->url = $request->url; might add this later
      $holiday->due_date = $request->due_date;

      $holiday->user()->associate($logged_in_user );//populate the piviot table

      $holiday->save();

      $holidays = \App\Holiday::where('user_id', '=', $logged_in_user->id)->get();
      return view('holidays.create')
               ->with('holidays', $holidays->toArray())
               ->with('user', $logged_in_user);
   }



   public function postDelete(Request $request)
   {
      $logged_in_user = \Auth::user();//find the user that is loged in

      $holiday_mod = \App\Holiday::find($request->id);

      //$userToDetatch = \App\User::find($logged_in_user->id);

      $holidayToDelete = \App\Holiday::with('escapes')
                         ->where('id', '=', $request->id)->get();


      $holiday_mod->escapes()->sync([]);

      $holiday_mod->delete();


      return view('holidays.deleted')->with('holiday', $holiday_mod);
   }



    public function postUpdateForm(Request $request)
    {
      $holiday = \App\Holiday::find($request->holiday_id);

      return view('holidays.update')->with('holiday', $holiday);
    }



   public function postUpdate(Request $request)
   {
            $holiday_to_update = \App\Holiday::where('id', '=', $request->id)
               ->update([
               'name'=>$request->name,
               'description'=>$request->description,
               ]);

            $holiday = \App\Holiday::find($request->id);

      return view('holidays.update')
               ->with('holiday', $holiday);
   }



}
