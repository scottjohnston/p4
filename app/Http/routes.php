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





Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});
