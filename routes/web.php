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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');




/* ======================================================================== */


Route::post('subscribe', 'App\Http\Controllers\HeaderandAboutController@subscribe')->name('subscribe');

/* Mail controller */
Route::get('sendconfirm', 'App\Http\Controllers\Mailcontroller@sendConfirm')->name('sendConfirm');
Route::get('notify', 'App\Http\Controllers\Mailcontroller@notify')->name('notify');

Route::post('mailResetcode', 'App\Http\Controllers\Mailcontroller@mailResetcode')->name('mailResetcode');

/* End Mail controller */

Route::post('uploadlogo', 'App\Http\Controllers\HeaderandAboutController@uploadlogo')->name('uploadlogo');

Route::post('confirmcode', 'App\Http\Controllers\UserController@confirmcode')->name('confirmcode');

Route::post('changepass', 'App\Http\Controllers\UserController@changepass')->name('changepass');

Route::post('addvideolink', 'App\Http\Controllers\HeaderandAboutController@storevideo')->name('addvideolink');

Route::get('viewblogs', 'App\Http\Controllers\HeaderandAboutController@viewblogs')->name('viewblogs');

Route::post('savePhoto', 'App\Http\Controllers\HeaderandAboutController@savePhoto')->name('savePhoto');

Route::get('updateentities', 'App\Http\Controllers\HeaderandAboutController@updateAllWritten')->name('updateentities');

Route::get('deletevlinks', 'App\Http\Controllers\HeaderandAboutController@deletevlinks')->name('deletevlinks');

Route::get('deleteall', 'App\Http\Controllers\DeleteController@deleteall')->name('deleteall');

Route::post('addall', 'App\Http\Controllers\Addcontroller@addall')->name('addall');

Route::get('membershipform', 'App\Http\Controllers\PageController@membership')->name('membershipform');

Route::post('saveMembership', 'App\Http\Controllers\Addcontroller@membership')->name('saveMembership');

Route::post('saveMessage', 'App\Http\Controllers\Addcontroller@sendmessage')->name('saveMessage');

Route::post('changestatus', 'App\Http\Controllers\Addcontroller@changestatus')->name('changestatus');

Route::get('readmessage', 'App\Http\Controllers\Addcontroller@readmessage')->name('readmessage');

Route::post('addadmin', 'App\Http\Controllers\Usercontroller@addadmin')->name('addadmin');


Route::get('approve', 'App\Http\Controllers\actionController@approve')->name('approve');

Route::post('deactivate', 'App\Http\Controllers\actionController@deactivate')->name('deactivate');

/* ======================================================================== */




Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});
