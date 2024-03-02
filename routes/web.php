<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

// admin ..
Route::prefix('admin')->namespace('admin')->group(function(){
    Route::get('/dashboard','pagesController@dashboard')->name('dashboard'); 
    Route::prefix('product')->group(function(){
        Route::get('/create','pagesController@create_product')->name('create.product');
        Route::get('/all','pagesController@products')->name('admin.products');
        Route::post('/save','pagesController@save_product')->name('save.product');
    });
    Route::prefix('sapliars')->group(function(){
        Route::get('/','pagesController@sapliars')->name('admin.sap');
        Route::post('/save','pagesController@sapliar_save')->name('sap.save');
        Route::get('/delete/{id}','pagesController@supliar_delete')->name('sap.delete');
    });
    Route::get('/customers','pagesController@customers')->name('admin.customers');
    Route::get('/settings','pagesController@settings')->name('admin.settings');  
});

Auth::routes();
