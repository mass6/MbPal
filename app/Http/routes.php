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

use Illuminate\Support\Facades\Request;


Route::get('/', function() {
    return redirect()->to('/dashboard');
});

Route::auth();

// Moves registration
Route::any('/moves/register/request-invitation', ['as' => 'moves.request-invitation', 'uses' => 'MovesAuthController@requestInvitation']);
Route::any('/moves/register/send-invitation', ['as' => 'moves.send-invitation', 'uses' => 'MovesAuthController@sendInvitation']);
Route::get('/moves/register', ['as' => 'moves.register', 'uses' => 'MovesAuthController@register']);
Route::get('/moves/confirmation', 'MovesAuthController@registrationConfirmed');
Route::get('/surveys/submitted', 'SurveysController@submitted');
Route::get('api/refresh-csrf', function(){
    return csrf_token();
});

// Backend Routes
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);
Route::get('/surveys/{survey}/export', ['as' => 'surveys.export', 'uses' => 'SurveysController@exportSurveyData']);
Route::get('/surveys', ['as' => 'surveys.index', 'uses' => 'SurveysController@index']);

// utility routes
Route::get('download', ['as' => 'download', function() {
    return response()->download(Request::get('path'), Request::get('filename'));
}]);

// Admin Routes
Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', 'Admin\UsersController');
});
Route::get('admin/logs', ['middleware' => 'auth', 'uses' => '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index']);
