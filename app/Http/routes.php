<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/********************************************************************
 * Login routes
 *******************************************************************/

// Show login form
Route::get('/', 'Auth\AuthController@getLogin');

// Process login form
Route::post('/login', 'Auth\AuthController@postLogin');

// Process logout
Route::get('/logout', 'Auth\AuthController@getLogout');

// Show registration form
Route::get('/register', 'Auth\AuthController@getRegister');

//Process registration form
Route::post('/register', 'Auth\AuthController@postRegister');



//routes that need authentication to access
Route::group (['middleware' => 'auth'], function(){

   /**************************************************************
      Routes for working with holidays
   ************************************************************/

   //on login you are sent to holiday create
   Route::get('/holiday/create', 'HolidayController@getCreate');

   //send data for a new holiday to be created in the database
   Route::post('/holiday/create', 'HolidayController@postCreate');


/************************************************************************************************/
   Route::get('/holiday/delete/{id?}', 'HolidayController@getDeleteForm');

   //deletes a holiday and its escapes from the database
   Route::post('/holiday/delete', 'HolidayController@postDelete');

   //sends the user to the update holiday form
   Route::get('/holiday/update/{id?}', 'HolidayController@getUpdateForm');

   //sends the changed data to the database
   Route::post('/holiday/update', 'HolidayController@postUpdate');

   /***************************************************************
      add escapes to the holidays
   ****************************************************************/

   //loads the form for adding an escape to a holiday
   Route::get('/holiday/addescape/{id?}', 'EscapeController@getAddEscape');

   //creates a new escape and adds it to a holiday
   Route::post('/escape/create', 'EscapeController@postCreate');

/*****************************************************************
 *Routes for working with escapes
 *
 *****************************************************************/

   //loads the form to update an escape
   Route::get('/escape/update/{id?}', 'EscapeController@getUpdate');

   //updates an escape in the db
   Route::post('/escape/update', 'EscapeController@postUpdate');




   Route::post('escape/delete/form', 'EscapeController@postDeleteForm');

   //deletes and escape
   Route::post('/escape/delete', 'EscapeController@postDelete');

});
