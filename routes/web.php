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
  Route::get('file', 'PublicController@index')->name('public.file');
  Route::post('find', 'PublicController@find')->name('public.file.find');
  Route::get('download/{id}', 'PublicController@download')->name('public.file.download');
});

Route::prefix('post')->group(function () {
  Route::get('/', 'InformationController@index')->name('post.index');
  Route::get('detail/{id}', 'InformationController@detail')->name('post.detail');
  Route::get('/store', 'InformationController@create')->name('post.store');
  Route::post('/store', 'InformationController@store')->name('post.store.submit');
  Route::get('edit/{id}', 'InformationController@show')->name('post.edit');
  Route::put('saveEdit/{id}', 'InformationController@update')->name('post.edit.submit');
  Route::delete('destroy/{id}', 'InformationController@destroy')->name('post.destroy');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('profile')->group(function () {
  Route::get('/', 'HomeController@home')->name('profile.home');
  Route::get('detail/{id}', 'HomeController@detail')->name('profile.detail');
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

Route::prefix('program')->group(function () {
  Route::get('/', 'ProgramController@index')->name('program.index');
  Route::get('detail/{id}', 'ProgramController@detail')->name('program.detail');
  Route::get('/store', 'ProgramController@create')->name('program.store');
  Route::post('/store', 'ProgramController@store')->name('program.store.submit');
  Route::get('edit/{id}', 'ProgramController@show')->name('program.edit');
  Route::put('saveEdit/{id}', 'ProgramController@update')->name('program.edit.submit');
  Route::delete('destroy/{id}', 'ProgramController@destroy')->name('program.destroy');
});
