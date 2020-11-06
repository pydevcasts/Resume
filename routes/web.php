<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.landing.landing');
});
Route::get('/login', function () {
    return view('frontend.landing.login');
});

// Route::any('/{any}', 'HomeController@index')->where('any', '.*');
Route::get('/{any}', function () {
    return view('home');
})->where('any','.*');

