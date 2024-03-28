<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CityController;

Route::view('/', 'auth.login');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// returns the home page with all posts
Route::get('/country', CountryController::class .'@index')->name('countries.index');
// returns the form for adding a post
Route::get('/posts/create', CountryController::class . '@create')->name('countries.create');
// adds a post to the database
Route::post('/posts', CountryController::class .'@store')->name('countries.store');
// returns a page that shows a full post
Route::get('/posts/{post}', CountryController::class .'@show')->name('countries.show');
// returns the form for editing a post
Route::get('/posts/{post}/edit', CountryController::class .'@edit')->name('countries.edit');
// updates a post
// Route::put('/country/{post}', CountryController::class ,'update')->name('countries.update');
// deletes a post
// Route::delete('/posts/{post}/id', CountryController::class .'@destroy')->name('countries.destroy');
Route::post('/countries/update/{id}', [CountryController::class, 'update'])->name('countries.update');



Route::get('/city', CityController::class .'@index')->name('cities.index');
// returns the form for adding a post
Route::get('/cities/create', CityController::class . '@create')->name('cities.create');
// adds a post to the database
Route::post('/cities', CityController::class .'@store')->name('cities.store');
// returns a page that shows a full post
Route::get('/cities/{city}', CityController::class .'@show')->name('cities.show');
// returns the form for editing a post
Route::get('/cities/{city}/edit', CityController::class .'@edit')->name('cities.edit');
// updates a post
Route::put('/cities/{city}', CityController::class .'@update')->name('cities.update');
// deletes a post
Route::delete('/cities/{city}', CityController::class .'@destroy')->name('cities.destroy');



Auth::routes();

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashboard',function(){
    return view('admin');
})->middleware('auth:admin');