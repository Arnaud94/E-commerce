<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/test', [
    'uses' => 'mainController@essai'
]);

Route::get('/test-tableau', [
    'uses' => 'mainController@tableau',
    'as'=>'route_test_tab'
]);

Route::get('/condition-de-vente', [
    'as' => 'url_vers_cgv', function () {
    return view('cgv');
}]);

Route::get('/notre-equipe', [
    'uses' => 'mainController@team',
    'as'=>'route_test_team',
]);





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
        "uses" => "mainController@home",
        "as" => "home"
    ]);


    Route::any('/contact', [
        'uses' => 'mainController@contact',
        'as'=>'route_contact',
    ]);


});
