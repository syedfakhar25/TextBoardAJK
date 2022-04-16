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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\Admin\DahboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\Admin\DahboardController::class, 'index'])->name('dashboard');
   //Publisher Management Routes
    Route::get('/publisher_application', [\App\Http\Controllers\Admin\PublisherController::class, 'applicationForm'])->name('publisher_application');
    Route::get('/publisher_showroom', [\App\Http\Controllers\Admin\PublisherController::class, 'publisherShowroom'])->name('publisher_showroom');
    Route::resource('publishers', App\Http\Controllers\Admin\PublisherController::class);

});

