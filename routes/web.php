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
Route::post('/volunteer/{volunteer}/team','VolunteerController@team')->name('volunteer-team');

Route::get('/team','TeamController@index')->name('team-list');
Route::view('/team/new','team.edit',['mode' => 'new'])->name('team-new');
Route::post('/team/store','TeamController@store')->name('team-store');
Route::get('/team/{team}','TeamController@show')->name('team-show');
Route::post('/team/{team}','TeamController@update')->name('team-update');
Route::get('/team/{team}/edit','TeamController@edit')->name('team-edit');
Route::post('/team/{team}/volunteers','TeamController@volunteers')->name('team-volunteers');
