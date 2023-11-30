<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\Post\AdminController@index')->name('admin.index');
});


Route::group(['prefix' => 'posts', 'namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/', 'IndexController')->name('post.index');
    Route::get('/create', 'CreateController')->name('post.create');
    Route::post('/', 'StoreController')->name('post.store');
    Route::get('/{post}', 'ShowController')->name('post.show');
    Route::patch('/{post}', 'UpdateController')->name('post.update');
    Route::get('/{post}/edit', 'EditController')->name('post.edit');
    Route::delete('/{post}', 'DestroyController')->name('post.delete');

});


Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.post');
Route::get('/contacts', 'App\Http\Controllers\ContactsController@index')->name('contact.post');

