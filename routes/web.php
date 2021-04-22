<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\App;

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

Route::get('locale/{locale}', 'PageController@changerLocale')->name('locale');

Route::middleware(['set_locale'])->group(function () {
    Route::get('/', 'PageController@index');
    Route::get('/ad/{id}', 'PageController@ad');

    // auth route for both
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    });

    // for user
    Route::group(['middleware' => ['auth', 'role:user']], function () {
        Route::get('/dashboard/create', 'DashboardController@create')->name('dashboard.create');
        Route::post('/dashboard/create', 'UserController@store')->name('dashboard.store');

        // show update
        Route::get('/update/{id}', 'UserController@show')->name('dashboard.show');

        // update
        Route::post('/update', 'UserController@update')->name('dashboard.update');

        // delete
        Route::get('/delete/{id}', 'UserController@delete')->name('dashboard.delete');
    });

    // for admin
    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::get('/admindash/ads', 'AdminController@index')->name('admindash.ads');

        // show update
        Route::get('admindash/update/{id}', 'AdminController@show')->name('admindash.show');

        // update
        Route::post('admindash/update', 'AdminController@update')->name('admindash.update');

        // delete
        Route::get('admindash/delete/{id}', 'AdminController@delete')->name('admindash.delete');
    });
});


require __DIR__.'/auth.php';
