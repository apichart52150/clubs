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

Route::get('/', function() {
    return redirect('/home');
});

Route::get('sac-tour', function() {
    return view('sac-tour');
})->name('sac-tour')->middleware('auth:student');


Route::get('/logincustom', 'Auth\StudentLoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\StudentLoginController@login')->name('student.login.submit');
Route::get('/logout', 'Auth\StudentLoginController@logout')->name('student.logout');

Route::get('/condition', 'ConditionController@index');
Route::post('/condition', 'ConditionController@condition_submit')->name('condition.submit');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/history', 'HistoryController@index');
Route::get('/faqs', 'FAQsController@index');
Route::get('/profile', 'ProfileController@index');

Route::post('register_club', 'ClubRegisterController@register_club')->name('register.submit');
Route::post('accept_cancel', 'ClubRegisterController@accept_cancel')->name('cancel.submit');

Route::get('/playback', 'VideoController@playback')->name('playback');
Route::get('/view_class', 'VideoController@viewClass')->name('view_class');
Route::get('/{class_id}', 'VideoController@video')->name('{class_id}');


Route::get('class/{nccode}', 'VideoController@viewVideo');
Route::post('class/add_video', 'VideoController@addVideo');
Route::post('class/edit_video', 'VideoController@editVideo');
Route::get('class/destroy/{id}', 'VideoController@destroy');


