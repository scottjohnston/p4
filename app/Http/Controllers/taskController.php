<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class taskController extends Controller
{

   public function getCreate(Request $request)
   {

       return view('layouts.createTasks')->with('request', $request);
   }
}
