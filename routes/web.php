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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**add adept profile details */
Route::get('/add_Profile_Details', 'AdeptController@addDetailsForm')->name('addAdeptDetailsForm');
Route::any('/add_Profile', 'AdeptController@addDetails')->name('addDetails');


/** display for different roles */
Route::get('/adept', 'AdeptController@index')->name('adept')->middleware('adept');
Route::get('/stakeholder', 'StakeholderController@index')->name('stakeholder')->middleware('stakeholder');
