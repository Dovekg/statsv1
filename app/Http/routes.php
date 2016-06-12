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
    return view('index');
});


Route::group(['middleware' => 'web'], function() {
	Route::auth();
	Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard'], function () {
		Route::get('/', 'DashboardController@index');
		Route::get('/download/{path}', ['as' => 'download.data', 'uses' => 'TasksController@downloadData' ]);
		Route::patch('/tasks/{id}/close', ['as' => 'dashboard.tasks.close', 'uses' => 'TasksController@close']);
		Route::patch('/tasks/{id}/claim', ['as' => 'dashboard.tasks.claim', 'uses' => 'TasksController@claim']);
		Route::patch('/tasks/{id}/complete', ['as' => 'dashboard.tasks.complete', 'uses' => 'TasksController@complete']);
		Route::patch('/tasks/{id}/bid', ['as' => 'dashboard.tasks.bid', 'uses' => 'TasksController@bid']);
		Route::resource('tasks', 'TasksController');
		Route::resource('comments', 'CommentsController');
	});
	Route::group(['prefix' => 'profile'], function() {
		Route::get('/', ['as' => 'profile.show', 'uses' => 'ProfilesController@show']);
		Route::get('/change', ['as' => 'profile.change', 'uses' => 'ProfilesController@change']);
		Route::patch('/{id}/password', ['as' => 'profile.password', 'uses' => 'ProfilesController@changePassword']);
		Route::patch('/{id}/username', ['as' => 'profile.username', 'uses' => 'ProfilesController@changeUsername']);
	});
});

