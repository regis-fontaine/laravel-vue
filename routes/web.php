<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::group(['auth:sanctum', 'verified'], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Create
    Route::get('/emailapp/create/contact', 'App\Http\Controllers\EmailAppController@pageCreateContact')->name('emailApp.pageCreateContact');
    Route::post('/emailapp/create/contact/new', 'App\Http\Controllers\EmailAppController@createNewContact');
    // Read
    Route::get('/emailapp', 'App\Http\Controllers\EmailAppController@index')->name('emailApp');
    // Edit
    Route::get('/emailapp/edit/contact/{id}', 'App\Http\Controllers\EmailAppController@editContact')->name('emailApp.editContact');
    Route::patch('/emailapp/contact/{id}', 'App\Http\Controllers\EmailAppController@updateContact')->name('emailApp.updateContact');
    // Edit Status
    Route::post('/emailApp/switchStatus/{id}/{status}', 'App\Http\Controllers\EmailAppController@switchStatus')->name('emailApp.switchStatus');

    // Delete
    Route::post('/emailApp/delete/{id}', 'App\Http\Controllers\EmailAppController@deleteContact')->name('emailApp.deleteContact');
});
