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

Route::get('/', function () {
    return view('welcome');
});

/********************************************************************
 * Login routes
 *******************************************************************/

Route::get('/sign_in', function() {
    return 'sign in here';
});

// needs to change to a post route
Route::get('/sign_inController', function() {
    return 'sign in post here';
});


Route::get('/sign_out/{user_id}', function($user_id) {
        return 'Here is the user_id of sign out user id is: '.$user_id;
});

/******************************************************************
 * Create user routes
 ******************************************************************/

Route::get('/create_user', function() {
    return 'create_user in here';
});

//needst to become a post *
Route::get('/create_userController', function() {
    return 'create_userController in here';
});

Route::get('/password_reset', function() {
    return 'password_reset in here';
});

// needs to be a post *
Route::get('/password_resetController', function() {
    return 'password_resetController in here';
});


/*****************************************************************
 *Routes for working with tasks
 *
 *****************************************************************/

//needs to change to a post
Route::get('/create_taskController', function() {
    return 'create_taskController in here';
});

Route::get('/delete_task/{task_id}', function($task_id) {
        return 'Delete task_id is: '.$task_id;
});

Route::get('/update_task/{task_id}', function($task_id) {
        return 'update task_id is: '.$task_id;
});


Route::get('Update_date_due/{date_due}', function($date_due) {
        return 'update date_due is: '.$date_due;
});

//calendar update needs more thought
Route::get('/calendar/query/{user_id}', function($date_due) {
        return 'update Calendar user_id is: '.$date_due;
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
