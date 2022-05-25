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
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\Admin\DahboardController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\Admin\DahboardController::class, 'index'])->name('dashboard');
    //Publisher Management Routes
    Route::get('/publisher_application', [\App\Http\Controllers\Admin\PublisherController::class, 'applicationForm'])->name('publisher_application');
    Route::get('/publisher_profile', [\App\Http\Controllers\Admin\PublisherController::class, 'publisherProfile'])->name('publisher_profile');
    Route::get('/publisher_profile_admin/{id}', [\App\Http\Controllers\Admin\PublisherController::class, 'publisherProfileAdmin'])->name('publisher_profile_admin');

    //admin will add EOI books and Ad
    Route::resource('books', App\Http\Controllers\Admin\BooksController::class);
    Route::get('/eoi_publishers/{id}', [App\Http\Controllers\Admin\BooksController::class, 'eoiPublishers'])->name('eoi_publishers');
    Route::get('/approve_eoi_publisher/{id}', [App\Http\Controllers\Admin\BooksController::class, 'approveEoiPublisher'])->name('approve_eoi_publisher');


    Route::resource('publishers', App\Http\Controllers\Admin\PublisherController::class);
    Route::resource('showroom', \App\Http\Controllers\Publisher\ShowroomController::class);
    Route::resource('documents', \App\Http\Controllers\Publisher\DocumentController::class);
    Route::resource('initial_registration', \App\Http\Controllers\Publisher\InitialRegisterationController::class);
    Route::get('/submit_registration', [\App\Http\Controllers\Publisher\InitialRegisterationController::class, 'register'])->name('submit_registration');
    Route::get('/approve_registration/{id}', [\App\Http\Controllers\Publisher\InitialRegisterationController::class, 'approve'])->name('approve_registration');
    //Route::resource('printmachine', \App\Http\Controllers\Publisher\PrintMachineController::class);
    Route::resource('eoiform', \App\Http\Controllers\Publisher\EOIController::class);
    Route::get('/eoiprofile', [\App\Http\Controllers\Publisher\EOIController::class, 'eoiProfile'])->name('eoiprofile');

});

