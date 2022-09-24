<?php

use GuzzleHttp\Middleware;
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


Auth::routes();

//public
Route::get('/', 'App\Http\Controllers\Public\HomeController@index')->name('home');
Route::get('category/{slug}', 'App\Http\Controllers\Public\CategoryController@getListProduct')->name('get.list.product');
Route::get('all-product', 'App\Http\Controllers\Public\ProductController@allProduct')->name('allProduct');
Route::get('news', 'App\Http\Controllers\Public\PostController@listNews')->name('news');
Route::get('/detailNews/{slug}', 'App\Http\Controllers\Public\PostController@detailNews')->name('detailNews');
Route::get('/detailProduct/{slug}', 'App\Http\Controllers\Public\ProductController@detailProduct')->name('detailProduct');
Route::get('search','App\Http\Controllers\Public\HomeController@Search')->name('search');
Route::get('contact','App\Http\Controllers\Public\ContactController@contactProduct')->name('contact');
Route::get('subscribe','App\Http\Controllers\Public\SubscribeController@subscribe')->name('subscribe');

// auth
Route::group(['middleware'=>'auth'], function() {
Route::post('/comment', 'App\Http\Controllers\Auth\CommentController@create')->name('comment');
});


//Admin//
Route::group(['middleware'=>'auth'], function(){
    Route::resource('posts', 'App\Http\Controllers\Admin\PostController');
    Route::resource('users', 'App\Http\Controllers\Admin\UserController');
    Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
    Route::resource('permissions', 'App\Http\Controllers\Admin\PermissionController');
    Route::resource('roles', 'App\Http\Controllers\Admin\RoleController');
    Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
    Route::resource('contacts', 'App\Http\Controllers\Admin\ContactController');
    Route::get('member-subscribe','App\Http\Controllers\Admin\SubscribeController@memberSubscribe')->name('member-subscribe');
});
