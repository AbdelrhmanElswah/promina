<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OAuthController;
use App\Http\Controllers\Admin\AlbumController;


/*
|--------------------------------------------------------------------------
| web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::redirect('/', '/admin/home');
// Admin Login and Logout Routes
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->group(function () {
    Route::get('login', 'AuthController@showLoginForm')->name('admin.login');
    Route::post('login', 'AuthController@login');
    Route::get('logout', 'AuthController@logout')->name('admin.logout');
});

// Protected Admin Routes
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')
    ->middleware('auth:admin')
    ->group(function () {
        Route::get('/home', 'HomeController@index');

        // Admins
        Route::resource('admins', 'AdminController');

        Route::resource('album', AlbumController::class);





    });
// OAuth Routes
Route::get('/oauth/authorize', 'App\Http\Controllers\OAuthController@authorizeToken')->name('oauth.authorize');
Route::post('/oauth/token', 'App\Http\Controllers\OAuthController@token')->name('oauth.token');
Route::post('/fulfillment', 'App\Http\Controllers\GoogleHomeController@fulfillment')->name('google.fulfillment');
