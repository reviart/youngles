<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::prefix('public')->group(function () {
  Route::get('about', 'PublicController@about')->name('public.about');
  Route::get('information', 'PublicController@information')->name('public.information');
  Route::get('information/{id}', 'PublicController@detailinformation')->name('public.detailinformation');
  Route::get('price', 'PublicController@price')->name('public.price');
  Route::get('about', 'PublicController@about')->name('public.about');

  Route::get('register', 'PublicController@create')->name('public.register');
  Route::post('register', 'PublicController@store')->name('public.register.submit');
});

Route::prefix('information')->group(function () {
  Route::get('/', 'InformationController@index')->name('information.index');
  Route::get('detail/{id}', 'InformationController@detail')->name('information.detail');
  Route::get('/store', 'InformationController@create')->name('information.store');
  Route::post('/store', 'InformationController@store')->name('information.store.submit');
  Route::get('edit/{id}', 'InformationController@show')->name('information.edit');
  Route::put('saveEdit/{id}', 'InformationController@update')->name('information.edit.submit');
  Route::delete('destroy/{id}', 'InformationController@destroy')->name('information.destroy');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('profile')->group(function () {
  Route::get('/', 'HomeController@home')->name('profile.home');
  Route::get('edit/{id}', 'HomeController@show')->name('profile.edit');
  Route::put('saveEdit/{id}', 'HomeController@update')->name('profile.edit.submit');
});

Route::prefix('member')->group(function () {
  Route::get('/', 'MemberController@index')->name('member.index');
  Route::get('detail/{id}', 'MemberController@detail')->name('member.detail');
  Route::get('/store', 'MemberController@create')->name('member.store');
  Route::post('/store', 'MemberController@store')->name('member.store.submit');
  Route::get('edit/{id}', 'MemberController@show')->name('member.edit');
  Route::put('saveEdit/{id}', 'MemberController@update')->name('member.edit.submit');
  Route::delete('destroy/{id}', 'MemberController@destroy')->name('member.destroy');
});

Route::prefix('booked')->group(function () {
  Route::get('/', 'BookedController@index')->name('booked.index');
  Route::get('detail/{id}', 'BookedController@detail')->name('booked.detail');
  Route::get('move/{id}', 'BookedController@move')->name('booked.move');
  Route::delete('destroy/{id}', 'BookedController@destroy')->name('booked.destroy');
});

Route::prefix('program')->group(function () {
  Route::get('/', 'ProgramController@index')->name('program.index');
  Route::get('detail/{id}', 'ProgramController@detail')->name('program.detail');
  Route::get('/store', 'ProgramController@create')->name('program.store');
  Route::post('/store', 'ProgramController@store')->name('program.store.submit');
  Route::get('edit/{id}', 'ProgramController@show')->name('program.edit');
  Route::put('saveEdit/{id}', 'ProgramController@update')->name('program.edit.submit');
  Route::delete('destroy/{id}', 'ProgramController@destroy')->name('program.destroy');
});
