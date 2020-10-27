<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.landing.landing');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'LandingController@landex')->name('profile');
Route::get('/{any}', 'HomeController@index')->where('any', '.*');

