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
      $holidays = \App\User::find($logged_in_user->id);//find their hollidays

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
               ->with('user', $user_owner);
   }




}
