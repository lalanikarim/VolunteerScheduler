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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/volunteer','VolunteerController@index')->name('volunteer-list');
Route::view('/volunteer/new','volunteer.edit',['mode' => 'new'])->name('volunteer-new');
Route::post('/volunteer/store','VolunteerController@store')->name('volunteer-store');
Route::get('/volunteer/{volunteer}','VolunteerController@show')->name('volunteer-show');
Route::post('/volunteer/{volunteer}','VolunteerController@update')->name('volunteer-update');
Route::get('/volunteer/{volunteer}/edit','VolunteerController@edit')->name('volunteer-edit');
