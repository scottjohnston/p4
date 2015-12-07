<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{
   public function getCreate(Request $request)
   {
      $holidays = \App\Holiday::with('escapes')->where('user_id','=','1')->get();

      return view('holidays.holidays')->with('holidays', $holidays);
   }






}
