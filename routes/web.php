<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

//Route::resource('boeking', 'BookingController');

// Calendar event routes
Route::get('event', 'CalendarEventController@index')->name('calendarevent');
Route::post('event', 'CalendarEventController@store');
Route::get('event/nieuw', 'CalendarEventController@create');
Route::get('event/{id}', 'CalendarEventController@show');
Route::get('event/{id}/wijzigen', 'CalendarEventController@edit');
Route::patch('event/{id}', 'CalendarEventController@update');
Route::delete('event/{id}', 'CalendarEventController@destroy');

// Calendar route
Route::get('agenda', 'CalendarController@index')->name('calendar');

// Home page 
Route::get('home', 'HomeController@index')->name('home');