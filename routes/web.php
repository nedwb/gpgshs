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

Auth::routes();

// Index routes (to be accessible by guest user)
Route::get('/index', 'IndexController@index')->name('index');
Route::get('/contact', 'IndexController@contact')->name('contact');
Route::get('/about', 'IndexController@about')->name('about');
Route::get('/about', 'IndexController@about')->name('about');
Route::get('/history', 'IndexController@history')->name('history');

// Home routes
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/', 'IndexController@index')->name('index');

// User verification routes
Route::get('/verify', 'MiscellaneousController@verify')->name('verify');
Route::get('/reminder', function () {
    return view('reminder');
});

// User password reset route
Route::get('/resetlnk', function () {
    return view('resetlnk');
});
Route::post('/resetlnk', 'MiscellaneousController@sendPasswordReset')->name('resetlnk');
Route::get('/resetpasswd', 'MiscellaneousController@showPasswordReset')->name('resetpasswd');
Route::post('/reset', 'MiscellaneousController@passwordReset')->name('reset');

//Routes for common pages for the track/strands.
Route::get('/academic', 'IndexController@getAcademicDetails')->name('academic');
Route::get('/tvl', 'IndexController@getTvlDetails')->name('tvl');
Route::get('/sports', 'IndexController@getSportDetails')->name('sports');
Route::get('/arts', 'IndexController@getArtDetails')->name('arts');

//Routes for the User Profiles.
Route::get('/profile_admin', 'AdminController@view_info')->name('profile_admin');
Route::get('/profile_1', 'UserDetailController@view_info')->name('profile_1');
Route::get('/profile_2', 'UserDetailController@view_info')->name('profile_2');
Route::get('/profile_3', 'UserDetailController@view_info')->name('profile_3');
Route::post('/profile_admin/save', 'AdminController@save_info')->name('profile_admin.save');
Route::post('/profile_1/save', 'UserDetailController@save_info')->name('profile_1.save');
Route::post('/profile_2/save', 'UserDetailController@save_info')->name('profile_2.save');
Route::post('/profile_3/save', 'UserDetailController@save_info')->name('profile_3.save');
Route::post('/profile_1/fetch', 'UserDetailController@fetch_info')->name('profile_1.fetch');

//Routes for the Personality, Testing and Results.
Route::get('/personality', 'PersonalityController@viewPersonality')->name('personality');
Route::post('/personality-test', 'PersonalityTestController@viewTestQuestions')->name('personality-test');
Route::post('/personality-result', 'PersonalityController@viewTestResults')->name('personality-result');

//Routes for Enrollment.
Route::get('/advisor', 'EnrollmentController@enrollment_precheck')->name('advisor');
Route::post('/advisor', 'EnrollmentController@enrollment_advisor')->name('advisor');

Route::get('/enrollment', 'EnrollmentController@enrollment_precheck')->name('enrollment');
Route::post('/enrollment', 'EnrollmentController@enrollment_verify_dtls')->name('enrollment');
Route::post('/enrollment/fetch', 'EnrollmentController@enrollment_fetch_course')->name('enrollment.fetch');
Route::post('/enrollment/save', 'EnrollmentController@enrollment_save')->name('enrollment.save');
Route::get('/enrollment_dtls', 'EnrollmentController@enrollment_print_dtls')->name('enrollment_dtls');
Route::post('/enrollment_dtls', 'EnrollmentController@enrollment_print_dtls')->name('enrollment_dtls');
Route::get('/enrollment_reqs', 'EnrollmentController@enrollment_reqs')->name('enrollment_reqs');
Route::post('/enrollment_upload', 'UploadFileController@uploadRequirements')->name('enrollment_upload');

// Routes for the career and school lookup.
Route::get('/lookup', 'CareerSchoolLookup@view_info')->name('lookup');
Route::post('/lookup', 'CareerSchoolLookup@view_info')->name('lookup');

//Routes for teacher or admin roles only.
Route::group(['middleware' => ['auth', 'teacher']], function() {
	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::post('/admin', 'AdminController@getQueryDetails')->name('admin');
	Route::post('/admin/fetch_strand', 'AdminController@admin_fetch_strand')->name('admin.fetch_strand');
	Route::post('/admin/update', 'AdminController@admin_update_status')->name('admin.update');
});

//Routes for admin roles only.
Route::group(['middleware' => ['auth', 'admin']], function() {
	Route::get('/admin_2', 'AdminController@index_2')->name('admin_2');
	Route::post('/admin_2', 'AdminController@getQueryDetails_2')->name('admin_2');
	Route::post('/admin_2/update', 'AdminController@admin_update_status_2')->name('admin_2.update');
	Route::get('/admin_3', 'AdminController@index_3')->name('admin_3');
	Route::post('/admin_3', 'AdminController@getQueryDetails_3')->name('admin_3');
	Route::post('/roleupdate', 'AdminController@roleUpdate')->name('roleupdate');
	Route::post('/perupdate', 'AdminController@personalityUpdate')->name('perupdate');
	Route::post('/schupdate', 'AdminController@schoolUpdate')->name('schupdate');
	Route::post('/qstupdate', 'AdminController@personalityQuestionUpdate')->name('qstupdate');
	Route::post('/strupdate', 'AdminController@strandUpdate')->name('strupdate');
	Route::post('/strschupdate', 'AdminController@schoolStrandMappingUpdate')->name('strschupdate');
	Route::post('/strschupdate/fetch', 'AdminController@fetch_school_details')->name('strschupdate.fetch');
	Route::post('/strperupdate', 'AdminController@personalityStrandMappingUpdate')->name('strperupdate');
	Route::post('/strperupdate/fetch', 'AdminController@fetch_personality_details')->name('strperupdate.fetch');
});

