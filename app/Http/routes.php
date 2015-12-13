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

Route::get('/home', function() {
    return 'home here fuck hey';
});

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

Route::get('/confirm-login-worked', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in, hi ' .$user->name;
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});







//needs to change to a post
Route::group (['middleware' => 'auth'], function(){

/*****************************************************************
 *Routes for working with escapes
 *
 *****************************************************************/

   Route::get('/escape/create', 'EscapeController@getCreate');

   Route::post('/escape/create', 'EscapeController@postCreate');

   Route::get('/escape/update/{id?}', 'EscapeController@getUpdate');

   Route::post('/escape/update', 'EscapeController@postUpdate');

   Route::get('/escape/delete/{id}', 'EscapeController@getDelete');





   /**************************************************************
      Routes for working with holidays

   ************************************************************/
   Route::get('/holiday/create', 'HolidayController@getCreate');

   Route::post('/holiday/create', 'HolidayController@postCreate');

   Route::post('/holiday/delete', 'HolidayController@postDelete');

   Route::post('/holiday/update', 'HolidayController@postUpdate');

   /**************adding escapes to holidys*******************/

   Route::post('/holiday/addescape', 'EscapeController@postAddEscape');

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


/*
 * Route for log viewer
 */
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


/*
 * Practice route for Debugbar
 *

Route::get('/practice', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Practice';





});*/
