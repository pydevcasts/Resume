<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResources(
    [
        'profile' => 'Backend\ProfileController'
    ]
);
Route::get('tag/edit/{id}', 'Backend\TagController@edit')->name('tag.edit');
Route::apiResources(
    [
        'tag' => 'Backend\TagController'
        ]
    );
Route::get('about/edit/{id}', 'Backend\AboutController@edit')->name('about.edit');
Route::apiResources(
    [
        'about'=>'Backend\AboutController'
    ]
    );
Route::get('gallery/edit/{id}', 'Backend\GalleryController@edit')->name('gallery.edit');
Route::apiResources(
    [
        'gallery'=>'Backend\GalleryController'
    ]
    );
Route::get('service/edit/{id}', 'Backend\ServiceController@edit')->name('service.edit');
Route::apiResources(
    [
        'service'=>'Backend\ServiceController'
    ]
    );