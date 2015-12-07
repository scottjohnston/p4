<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PracticeController extends Controller
{
     function getExample12()
     {

        # Get the current logged in user
   	  $user = \Auth::user();
        if($user)
        {
            echo 'Hi logged in user '.$user->name.'<br>';
        }

        # Get a user from the database
        $user = \App\User::where('name','like','Jamal')->first();
        echo 'Hi '.$user->name.'<br>';
	 }


	/* Get all the holidays, eagerly loading the escapes
   *****************************************************************************
	*/
    function getExample11()
    {
          //return "Practice controller";
        $holidays = \App\Holiday::with('escapes')->where('user_id','=','1')->get();
        foreach($holidays as $holiday)
        {
            echo '<br>'.$holiday->name.'<br>escape with: ';
            foreach($holiday->escapes as $escape)
            {
                echo $escape->name.' ';
            }
        }


        dump($holidays);
     }
/*******************************************************************************/

     function getExample10() {
        $holiday = \App\Holiday::where('user_id', '=', '1')->get();
       // echo $holiday->name.' has these escapes: ';

        foreach($holiday as $hol)
        {
           echo '<br>' .$hol->name. ' ';
           foreach($hol as $h)
           {
             echo '<br> h is: '.$h.' ';
          }
        }
         dump($holiday);
     }

     function getExample9() {
        //eager load the escapes with the Holidays
        $holidays = \App\Holiday::with('escapes')->get();
        //$user = $holiday->user;
        dump($holidays);
        //echo $holiday->name. ' belongs to ' .$escape->

     }


/**********Enter a new holiday*works*************************************************/


    function getExample7()
    {
      $user_id = '1';//\Auth::user();
      $holiday = new \App\Holiday;

      $holiday->user_id = $user_id;
      $holiday->due_date = '18/12/15';
      $holiday->name = 'trip to the Kemberley WA';
      $holiday->description = 'one of the remotest, wildest and most beautiful regions on earth.';
      $holiday->save();


      $holidays = \App\Holiday::all();
      dump($holidays);
      return 'Eample 7';
    }


/******enter a new escape and associate it with a holiday***************/

   function getExample6()
   {
       $escape = new \App\Escape;
       $holiday = new \App\Holiday;
       $holiday = \App\Holiday::where('id', '=', '1')->get();


       $escape->name = 'Broome';
       $escape->description = 'coastal, pearling and tourist town in the Kimberley region of Western Australia';
       $escape->url = 'https://en.wikipedia.org/wiki/Broome,_Western_Australia';
       $escape->cost = '50000';
       //$escape->holidays()->attach($holiday->toArray());//->associate(); hmmm



       $escapes = \App\Escape::all();
       dump($escape);

       //dump($holiday->name);

       return "this is 6";
   }















}
