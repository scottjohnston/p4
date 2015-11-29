<?php
use Illuminate\Http\Request; //needs to go
use App\Http\Requests;     //test code only
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

Route::get('/', function () {
    return view('layouts.welcome');
});

/********************************************************************
 * Login routes
 *******************************************************************/

Route::get('/login', function() {
    return 'login here';
});

// needs to change to a post route
//Route::get('/login', function() {
//    return 'sign in post process the form here';
//});


Route::get('/logout/{user_id}', function($user_id) {
        return 'Here is the user_id of sign out user id is: '.$user_id;
});

/******************************************************************
 * Create user routes
 ******************************************************************/

Route::get('/register', function() {
    return view('layouts.register');
});

//needst to become a post *
//Route::get('/register', function() {
//    return 'register user process the form in here';
//});

Route::get('/password/reset', function() {
    return 'password reset in here';
});

// needs to be a post *
//Route::get('/password/reset', function() {
//    return 'password process form in here';
//});


/*****************************************************************
 *Routes for working with tasks
 *
 *****************************************************************/

//needs to change to a post
Route::get('/task/create', function(Request $request) {
    return view('layouts.createTasks')->with('request', $request);
});

Route::get('/task/delete/{task_id}', function($task_id) {
        return 'Delete task_id is: '.$task_id;
});

Route::get('/task/update/{task_id}', function($task_id) {
        return 'update task_id is: '.$task_id;
});


Route::get('/task/update/due/{date_due}', function($date_due) {
        return 'update date_due is: '.$date_due;
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
 */
Route::get('/practice', function() {

    $data = Array('foo' => 'bar');
    Debugbar::info($data);
    Debugbar::error('Error!');
    Debugbar::warning('Watch out…');
    Debugbar::addMessage('Another message', 'mylabel');

    return 'Practice';





});
