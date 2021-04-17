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

/*
Route::get('/users/{id}', function($id){
    return 'this is user '.$id;
});
*/

Route::get('/', 'App\Http\Controllers\PagesController@index');

Route::get('/about', 'App\Http\Controllers\PagesController@about');

Route::get('/services', 'App\Http\Controllers\PagesController@services');

Route::resource('posts', 'App\Http\Controllers\PostsController');

Route::get('/search','App\Http\Controllers\PostsController@search');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard/post-members/{post}', [App\Http\Controllers\HomeController::class, 'showPostMembers'])->name('home');


Route::get('/applications/my-applications/{post}', 'App\Http\Controllers\ApplicationController@apply');

Route::get('/applications/my-applications', 'App\Http\Controllers\ApplicationController@showSentApplications');

Route::get('/applications/recieved-applications', 'App\Http\Controllers\ApplicationController@showRecievedApplications');

Route::get('/getRecievedApplications', 'App\Http\Controllers\ApplicationController@getRecievedApplications');

Route::post('/applications/accept', 'App\Http\Controllers\ApplicationController@accept');

Route::post('/applications/decline', 'App\Http\Controllers\ApplicationController@decline');

Route::get('/post-members/{post}/attendance', 'App\Http\Controllers\AttendanceController@index');

Route::post('/post-members/attendance/present', 'App\Http\Controllers\AttendanceController@attendancePresent');
Route::post('/post-members/attendance/absent', 'App\Http\Controllers\AttendanceController@attendanceAbsent');
