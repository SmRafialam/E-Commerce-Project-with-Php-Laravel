<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard',function(){
    return view('backend.dashboard');
})->name('dashboard');

// Route::get('/add', function () {
//     return view('backend.pages.product.addproduct');
// })->name('dashboard');

// for product
Route::group(['prefix'=>'/product'],function(){
    Route::post('/store','App\Http\Controllers\Backend\ProductController@store')->name('store');

    Route::get('/create','App\Http\Controllers\Backend\ProductController@create')->name('create');

    Route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->name('manage');

    Route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->name('edit');

    Route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->name('update');

    Route::get('/delete/{id}','App\Http\Controllers\Backend\ProductController@destroy')->name('delete');
});

//for category
Route::group(['prefix'=>'/category'],function(){
    Route::post('/store','App\Http\Controllers\Backend\CategoryController@store')->name('catstore');

    Route::get('/create','App\Http\Controllers\Backend\CategoryController@create')->name('catcreate');

    Route::get('/manage','App\Http\Controllers\Backend\CategoryController@index')->name('catmanage');

    Route::get('/edit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->name('catedit');

    Route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('catupdate');

    Route::get('/delete/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->name('catdelete');
});