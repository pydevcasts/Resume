<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ای \ی آی هاییی که زدی درست نیست چون باید ی ای |یآي اصلی داشته باشی
// که داخلش لیست اطلاعات الزامی رو بفرستی برای فرانت
// حالا این بماند بعدا درست کن
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(
    [
        'profile' => 'Backend\ProfileController',
        
    ]
        
);

Route::get('allTags' , 'Backend\ProfileController@allTags');

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
Route::apiResources(
    [
        'contact'=>'Frontend\ContactController'
    ]
    );