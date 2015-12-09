<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
   public function getCreate()
   {
      $holidays = \App\Holiday::with('escapes')->where('user_id','=','1')->get();

      return view('holidays.create')->with('holidays', $holidays);
   }

   public function postCreate(Request $request)
   {
      $holiday = new \App\Holiday();

      $user = \App\User::where('id', '=', '1')->get();

      $holiday->name = 'test holiday';//$request->name;
      $holiday->description = 'this is the test';//$request->description;
      //$holiday->url = $request->url; might add this later
      $holiday->due_date = $request->due_date;
      $holiday->user()->associate($user);//this s a shit function

      $holiday->save();

      $holidays = \App\holiday::all();
      return view('holidays.create')
               ->with('holidays', $holidays->toArray())
               ->with('user', $user);
   }




}
