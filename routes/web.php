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
Route::post('/addProfiles', 'AdeptController@addDetails')->name('addProfileDetails');
Route::get('/viewProfiles', 'AdeptController@viewProfile')->name('viewSkillholder');



/** display for different roles */
Route::get('/adept', 'AdeptController@index')->name('adept')->middleware('adept');
Route::get('/stakeholder', 'StakeholderController@index')->name('stakeholder')->middleware('stakeholder');

/**add skill */
Route::get('/addSkills', 'SkillController@addSkill')->name('addSkill');
Route::any('/addSkillss', 'AdeptController@addSkills')->name('addSkills');

/**view the display of searched */
Route::any('/searchResults', 'StakeholderController@searchBySkill')->name('results')->middleware('stakeholder');
Route::get('/searchResult', 'StakeholderController@viewResults')->name('viewResult');
Route::get('/allSkillholders', 'StakeholderController@viewallskillholders')->name('holders');
Route::get('/more/{id}', 'StakeholderController@moreDetails')->name('moreUserDetails');

/**add stakeholder add profile */
Route::get('/addProfile', 'StakeholderController@viewDetails')->name('profile')->middleware('stakeholder');
Route::any('/add_stakeholder_Profile', 'StakeholderController@addDetails')->name('add_stakeholder_Profile');
Route::get('/myprofile', 'StakeholderController@profileDetails')->name('myProfile');

/**do to dashboard button */
Route::get('/used_logged_in', 'StakeholderController@redirectTo')->name('goToDashboard');

/**view to admin */
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/viewStakeholdersPending', 'AdminController@pendingStakeholder')->name('viewPendingStakeholders');
Route::get('/approveStakeholdersPending/{id}', 'AdminController@approveStakeholder')->name('PendingStakeholders');
Route::get('/viewCoursesPending', 'AdminController@viewPendingCourses')->name('PendingCourse');
Route::get('/approveCoursePending/{id}', 'SkillController@approve')->name('approvePending');
