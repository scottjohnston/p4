<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HolidayController extends Controller
{

   /* getCreate gets the logged in user information and loads
   *  the users holidays + escapes in to holidays.create which provides
   *  a form to manage holidays wit
   */
   public function getCreate()
   {
      $logged_in_user = \Auth::user();//get the current user that is authenticated
      $holidays = \App\Holiday::where('user_id', '=', $logged_in_user->id)->get();//find their holidays

      //sort the collection so that the latest holiday is at the top
      $holidays = $holidays->sortByDesc('id');

      return view('holidays.create')->with('holidays', $holidays);
   }

   /*  postCreate validates the form data for creating holidays
   *   uses the request data and the current user data to create
   *   a new holiday and returns the user back to the create form
   *   with a list of holidays that is displayed below the form
   */
   public function postCreate(Request $request)
   {
      $this->validate(
            $request,
            [
                'name' => 'required|min:5|max:256',
                'description' => 'required|min:5|max:256',
                'due_date'=>'required|date',
            ]
        );

      $holiday = new \App\Holiday();//create a new holiday object
      $logged_in_user = \Auth::user();//get the current user that is authenticated


      $holiday->name = $request->name;//get the name of the new holiday
      $holiday->description = $request->description;//get the description
      //$holiday->url = $request->url; might add this later

      $holiday->due_date = $request->due_date;//get the due date

      $holiday->user()->associate($logged_in_user );//link the FK to the user

      $holiday->save();//save the holiday to the database


      //return to the create view with all the holidays for that user
      $holidays = \App\Holiday::where('user_id', '=', $logged_in_user->id)->get();

      //sort the collection so that the latest holiday is at the top
      $holidays = $holidays->sortByDesc('id');

      return view('holidays.create')
               ->with('holidays', $holidays->toArray());
   }


   /*  getDeleteForm accepts the id of the holiday to be deleted as
   *   a parameter and loads the holiday into the delete form
   *
   */
    public function getDeleteForm($id)
    {
      //get the holiday with its escapes
      $holiday = \App\Holiday::with('escapes')
                         ->where('id', '=', $id)->get();

      //return to holiday.delete with the holiday and its escapes
      return view('holidays.delete')->with('holiday', $holiday);
    }


   /*  postDelete accepts the id of a holiday from the request variable
   *   and deletes the holiday first syncing the pivot table and then
   *   removing its escapes from the database
   *   it then returns the user to the create holiday page
   */
   public function postDelete(Request $request)
   {
      $logged_in_user = \Auth::user();//find the user that is logged in

      $holiday_mod = \App\Holiday::find($request->id);//get the holiday from the DB

      $holidayToDelete = \App\Holiday::with('escapes')
                         ->where('id', '=', $request->id)->get();//get the holiday and the escapes

      $holiday_mod->escapes()->sync([]);//remove the escapes from the pivot table escape_holiday

      $holiday_mod->delete();//delete the holiday

      //iterate over the escapes and delete them from the escape table
      foreach ($holidayToDelete[0]['escapes']as $escape)
      {
         $escapeToDelete = \App\Escape::find($escape->id);
         $escapeToDelete->delete();
      }

      //send the user back to the holiday create page
      return redirect('holiday/create');
   }


   /*  getUpdateForm accepts id as a parameter and finds the
   *   holiday from the db returning the object with holiday.update
   *   which loads the form for the update process
   */
    public function getUpdateForm($id)
    {
      $holiday = \App\Holiday::find($id);

      return view('holidays.update')->with('holiday', $holiday);
    }

    /*   postUpdate validates the request variable data from the
    *    update holiday form and updates the fields in the holidays
    *    table of the database
    */

   public function postUpdate(Request $request)
   {
      $this->validate(
            $request,
            [
                 'name' => 'required|min:5',
                 'description' => 'required|min:5|max:256',
                 'due_date'=>'required|date',
            ]
        );

     //gets the holiday to be updated and loads the request data to the DB
      $holiday_to_update = \App\Holiday::where('id', '=', $request->id)
         ->update([
         'name'=>$request->name,
         'description'=>$request->description,
         'due_date'=>$request->due_date,
         ]);

      //retrieves the updated data from the db for display
      $holiday = \App\Holiday::find($request->id);

      return view('holidays.update')
               ->with('holiday', $holiday);
   }



}
