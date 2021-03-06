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

Route::get('/', 'FrontendController@index');

Route::get('/new-appointment/{doctorId}/{date}', 'FrontendController@show')->name('create.appointment');

Route::group(['middleware' => ['auth', 'Patient']], function () {
    Route::post('/booking/appointment', 'FrontendController@store')->name('booking.appointment');

    Route::get('/my-booking', 'FrontendController@myBookings')->name('my.booking');

    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store')->name('profile.store');
    Route::post('/profile-pic', 'ProfileController@profilePic')->name('profile.pic');
});


Route::get('/dashboard', 'DashboardController@index');
Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'Admin']], function () {
    Route::resource('dentist', DentistController::class);
});

Route::group(['middleware' => ['auth', 'Dentist']], function () {
    Route::resource('appointment', AppointmentController::class);
    Route::post('/appointment/check', 'AppointmentController@check')->name('appointment.check');
    Route::post('/appointment/update', 'AppointmentController@updateTime')->name('update');
});
