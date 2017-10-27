<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return \Illuminate\Support\Facades\Redirect::to('/login');
});



Auth::routes();

Route::middleware(['auth'])->group(function (){

    Route::get('/test', 'TestController@index');
    Route::get('/home', 'TestController@index')->name('home');
    Route::get('/profile', 'TestController@index');



    Route::group(['prefix' => 'lead'], function () {
            Route::get('/add', 'LeadController@index');
            Route::post('/add', 'LeadController@save');
            Route::get('/view', 'LeadController@view');
            Route::get('/edit/{id}', 'LeadController@edit');
            Route::get('/delete/{id}', 'LeadController@delete');
            Route::get('/status/{id}/{status}', 'LeadController@changeLeadStatus');

            Route::post('/update/{id}', 'LeadController@update');
            Route::post('/setfollowup', 'LeadController@setfollowup');
            Route::post('/reschedulefollowup/{id}', 'LeadController@reschedulefollowup');

            Route::get('/blocked', 'LeadController@blocked');
            Route::get('/activate/{id}', 'LeadController@activate');

            Route::get('/converted', 'LeadController@converted');

            Route::get('/followup/{id}', 'LeadController@followup');
            Route::get('/delete-followup/{id}', 'LeadController@deletefollowup');

    });
});

