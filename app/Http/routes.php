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


Route::get('/', 'HomeController@index');
Route::get('/services', 'HomeController@services');
Route::get('/faq', 'HomeController@faq');
Route::get('/contact', 'HomeController@contact');

Route::get('/home', 'HomeController@home');
Route::resource('messages', 'MessagesController');
Route::auth();


Route::get('/analyst/register/{token}', ['as' => 'analyst_register', 'uses' => 'Auth\AuthController@anaRegister']);
Route::post('/analyst/register/{token}', 'Auth\AuthController@postAnaRegister');
Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard'], function () {
		Route::get('/', 'DashboardController@index');
		Route::get('/download/{path}', ['as' => 'download.data', 'uses' => 'TasksController@downloadData' ]);
		Route::patch('/tasks/{id}/claim', ['as' => 'dashboard.tasks.claim', 'uses' => 'TasksController@claim']);
		Route::patch('/tasks/{id}/complete', ['as' => 'dashboard.tasks.complete', 'uses' => 'TasksController@complete']);
		Route::patch('/tasks/{id}/bid', ['as' => 'dashboard.tasks.bid', 'uses' => 'TasksController@bid']);
		Route::get('/tasks/claimed', ['as' => 'dashboard.tasks.claimed', 'uses' => 'TasksController@claimed']);
		Route::get('/tasks/completed', ['as' => 'dashboard.tasks.completed', 'uses' => 'TasksController@completed']);
		Route::get('/tasks/closed', ['as' => 'dashboard.tasks.closed', 'uses' => 'TasksController@closed']);
		Route::resource('tasks', 'TasksController');
		Route::resource('comments', 'CommentsController');
		Route::resource('users', 'UsersController');
		Route::resource('perms', 'PermsController');
		Route::resource('roles', 'RolesController');
		Route::resource('methods', 'MethodsController');
	});
	Route::group(['prefix' => 'profile'], function() {
		Route::get('/', ['as' => 'profile.show', 'uses' => 'ProfilesController@show']);
		Route::get('/change', ['as' => 'profile.change', 'uses' => 'ProfilesController@change']);
		Route::patch('/{id}/password', ['as' => 'profile.password', 'uses' => 'ProfilesController@changePassword']);
		Route::patch('/{id}/username', ['as' => 'profile.username', 'uses' => 'ProfilesController@changeUsername']);
	});

Route::group(['middleware' => 'web'], function() {
	
});



/**
 * Teamwork routes
 */
Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function()
{
    Route::get('/', 'TeamController@index')->name('teams.index');
    Route::get('create', 'TeamController@create')->name('teams.create');
    Route::post('teams', 'TeamController@store')->name('teams.store');
    Route::get('edit/{id}', 'TeamController@edit')->name('teams.edit');
    Route::put('edit/{id}', 'TeamController@update')->name('teams.update');
    Route::delete('destroy/{id}', 'TeamController@destroy')->name('teams.destroy');
    Route::get('switch/{id}', 'TeamController@switchTeam')->name('teams.switch');

    Route::get('members/{id}', 'TeamMemberController@show')->name('teams.members.show');
    Route::get('members/resend/{invite_id}', 'TeamMemberController@resendInvite')->name('teams.members.resend_invite');
    Route::post('members/{id}', 'TeamMemberController@invite')->name('teams.members.invite');
    Route::delete('members/{id}/{user_id}', 'TeamMemberController@destroy')->name('teams.members.destroy');

    Route::get('accept/{token}', 'AuthController@acceptInvite')->name('teams.accept_invite');
});
