<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@HomeIndex')->middleware('loginCheck');
Route::get('/visitor', 'VisitorController@VisitorIndex')->middleware('loginCheck');

// Admin Panel Service Management
Route::get('/service', 'ServiceController@ServiceIndex')->middleware('loginCheck');
Route::get('/getServicesData', 'ServiceController@getServiceData')->middleware('loginCheck');
Route::post('/ServiceDelete', 'ServiceController@ServiceDelete')->middleware('loginCheck');
Route::post('/ServiceDetails', 'ServiceController@getServiceDetails')->middleware('loginCheck');
Route::post('/ServiceUpdate', 'ServiceController@ServiceUpdate')->middleware('loginCheck');
Route::post('/ServiceAdd', 'ServiceController@ServiceAdd')->middleware('loginCheck');


// Admin Panel Courses Management
Route::get('/Courses', 'CoursesController@CoursesIndex')->middleware('loginCheck');
Route::get('/getCoursesData', 'CoursesController@getCoursesData')->middleware('loginCheck');
Route::post('/CoursesDelete', 'CoursesController@CoursesDelete')->middleware('loginCheck');
Route::post('/CoursesDetails', 'CoursesController@getCoursesDetails')->middleware('loginCheck');
Route::post('/CoursesUpdate', 'CoursesController@CoursesUpdate')->middleware('loginCheck');
Route::post('/CoursesAdd', 'CoursesController@CoursesAdd')->middleware('loginCheck');

// Admin Panel Project Management
Route::get('/Projects','ProjectController@ProjectsIndex')->middleware('loginCheck');
Route::get('/getProjectsData', 'ProjectController@getProjectsData')->middleware('loginCheck');
Route::post('/ProjectsDelete', 'ProjectController@ProjectsDelete')->middleware('loginCheck');
Route::post('/ProjectsDetails', 'ProjectController@getProjectsDetails')->middleware('loginCheck');
Route::post('/ProjectsUpdate', 'ProjectController@ProjectsUpdate')->middleware('loginCheck');
Route::post('/ProjectsAdd', 'ProjectController@ProjectsAdd')->middleware('loginCheck');

// Admin panel Contact Management
Route::get('/Contact','ContactController@ContactIndex')->middleware('loginCheck');
Route::get('/getContactData','ContactController@getContactData')->middleware('loginCheck');
Route::post('/ContactDelete','ContactController@ContactDelete')->middleware('loginCheck');


// Admin panel Review Management
Route::get('/Review','ReviewController@ReviewIndex')->middleware('loginCheck');
Route::get('/getReviewData','ReviewController@getReviewData')->middleware('loginCheck');
Route::post('/ReviewDelete','ReviewController@ReviewDelete')->middleware('loginCheck');
Route::post('/getReviewDetails','ReviewController@getReviewDetails')->middleware('loginCheck');
Route::post('/ReviewUpdate','ReviewController@ReviewUpdate')->middleware('loginCheck');
Route::post('/ReviewAdd','ReviewController@ReviewAdd')->middleware('loginCheck');

//Admin Login
Route::get('/Login','LoginController@LoginIndex');
Route::post('/onLogin','LoginController@onLogin');
Route::get('/Logout','LoginController@onLogout');