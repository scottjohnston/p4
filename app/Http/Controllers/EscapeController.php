<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EscapeController extends Controller
{

   /*  getAddEscape loads a form to add escapes to
    *  the selected holiday. It accepts one parameter
    *  the holiday id and loads the holiday with its
    *  escapes
    */
    public function getAddEscape($id)
    {
        $holidayToUpdate = \App\Holiday::with('escapes')
                           ->where('id', '=', $id)->get();

        return view('escapes.create')
               ->with('holidayToUpdate', $holidayToUpdate);
    }


    /* postCreate validates the request variable sent from the
    *  create escape form and creates the new escape
    *
    */
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

       $holiday = \App\Holiday::find($request->id);//finds the holiday that the escape will belong to

      //create a new escape in the database
      $escape = new \App\Escape();
      $escape->name = $request->name;
      $escape->description = $request->description;
      $escape->url = $request->url;
      $escape->cost = $request->cost;

      $escape->save();//save the escape

      //get the existing escapes that belong to that holiday
      $escapes = \App\Escape::where('id', '=', $request->holiday_id);

      //sync all the escapes that belong to that holiday to the holdiay_escape table
      $escape->holidays()->sync([$request->holiday_id]);

      //load the holiday with its escapes and return them to the the create escapes page
      $holidayToUpdate = \App\Holiday::with('escapes')
                         ->where('id', '=', $request->holiday_id)->get();

      return view('escapes.create')
             ->with('holidayToUpdate', $holidayToUpdate);
    }


    /*  getUpdate loads the escape that is passed to the function
    *   as a paramater it then returns escapes.update with the data
    */
    public function getUpdate($id)
    {
      $escape = \App\Escape::where('id', '=', $id)->get();

      return view('escapes.update')->with('escape', $escape->toArray());
    }


    /* postUpdate validates the request variable it then
    *  gets the escape to be updated and saves the new
    *  to the DB. it returns to escapes.update with the changed
    *  escape
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

      //create a new escape
      $escape = new \App\Escape();
      //load the new escape with the escape to be updated and save it to the db
      $escape = \App\Escape::where('id', '=', $request->id)
         ->update([
         'name'=>$request->name,
         'description'=>$request->description,
         'url'=>$request->url,
         'cost'=>$request->cost
         ]);

      //get the escape from the database and return it to escapes.update
      $escapes = \App\Escape::where('id', '=', $request->id)->get();

      return view('escapes.update')->with('escape', $escapes);
    }


    /* postDeleteForm gets the holiday_id, and the escape_id form
    *  the request variable that is passed to it as a parameter
    *  It then loads the data into the delete form for deletion
    */

    public function postDeleteForm(Request $request)
    {
      $holiday_id = $request->holiday_id;//get the holiday_id

      //get the escape from the db
      $escape = \App\Escape::where('id', '=', $request->id)->get();

      //return to the escape page for final deletion
      return view('escapes.delete')
                  ->with('escape', $escape)
                  ->with('holiday_id', $holiday_id);
    }


    /*  postDelete deletes the escape that is
    *   passed to it in the request variable
    *   and returns to the escapes.create and loads
    *   the remaining escapes that belong to that holiday
    */

    public function postDelete(Request $request)
    {
      //gets the holiday that the escape belongs to
      $holiday = \App\Holiday::find($request->holiday_id);

      //loads the escape to be delete
      $escapeToDelete = \App\Escape::find($request->id);

      //detaches the escape from the holiday
      $holiday->escapes()->detach($request->id);

      //deletes the escape
      $escapeToDelete->delete();

      //load the holiday with its escapes
      $holidayWithEscapes = \App\Holiday::with('escapes')
                          ->where('id', '=', $request->holiday_id)->get();

      return view('escapes.create')
             ->with('holidayToUpdate', $holidayWithEscapes);
   }






}
