<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/profile/edit/{id}', 'Backend\ProfileController@edit')->name('profile.edit');
Route::apiResources(
    [
        'profile' => 'Backend\ProfileController',

    ]

);

Route::get('tag/edit/{id}', 'Backend\TagController@edit')->name('tag.edit');
Route::get('/deletetag/{id}', 'Backend\TagController@selected_tag');
Route::apiResources(
    [
        'tag' => 'Backend\TagController'
    ]
);

Route::get('about/edit/{id}', 'Backend\AboutController@edit')->name('about.edit');
Route::apiResources(
    [
        'about' => 'Backend\AboutController'
    ]
);

Route::get('gallery/edit/{id}', 'Backend\GalleryController@edit')->name('gallery.edit');
Route::apiResources(
    [
        'gallery' => 'Backend\GalleryController'
    ]
);

Route::get('service/edit/{id}', 'Backend\ServiceController@edit')->name('service.edit');
Route::apiResources(
    [
        'service' => 'Backend\ServiceController'
    ]
);

Route::apiResources(
    [
        'contact' => 'Frontend\ContactController'
    ]
);

Route::middleware(['api'])->group(function ($router) {
    Route::post('login', 'Frontend\AuthController@login');
    Route::post('logout', 'Frontend\AuthController@logout');
    Route::post('refresh', 'Frontend\AuthController@refresh');
    Route::get('me', 'Frontend\AuthController@me');
});
