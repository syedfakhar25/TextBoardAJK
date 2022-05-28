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

    //admin first review
    Route::get('/ircadmin', [\App\Http\Controllers\Publisher\IRCController::class, 'ircAdmin'])->name('ircadmin');
    Route::get('/irc_publishers/{id}', [\App\Http\Controllers\Publisher\IRCController::class, 'ircPublishers'])->name('irc_publishers');
    Route::get('/approve_irc_publisher/{id}', [\App\Http\Controllers\Publisher\IRCController::class, 'approveIrcPublishers'])->name('approve_irc_publisher');

    //admin second review
    Route::get('/krcadmin', [\App\Http\Controllers\Publisher\KRCController::class, 'krcAdmin'])->name('krcadmin');
    Route::get('/krc_publishers/{id}', [\App\Http\Controllers\Publisher\KRCController::class, 'krcPublishers'])->name('krc_publishers');
    Route::get('/approve_krc_publisher/{id}', [\App\Http\Controllers\Publisher\KRCController::class, 'approveKrcPublishers'])->name('approve_krc_publisher');

    //admin third review
    Route::get('/scfadmin', [\App\Http\Controllers\Publisher\SCFController::class, 'scfAdmin'])->name('scfadmin');
    Route::get('/scf_publishers/{id}', [\App\Http\Controllers\Publisher\SCFController::class, 'scfPublishers'])->name('scf_publishers');
    Route::get('/approve_scf_publisher/{id}', [\App\Http\Controllers\Publisher\SCFController::class, 'approveScfPublishers'])->name('approve_scf_publisher');

    //admin gives NOC after 3 reviews
    Route::resource('noc', \App\Http\Controllers\Admin\NocController::class);
    Route::get('/noc_publishers/{id}', [\App\Http\Controllers\Admin\NocController::class, 'nocPublishers'])->name('noc_publishers');



    Route::resource('publishers', App\Http\Controllers\Admin\PublisherController::class);
    Route::resource('showroom', \App\Http\Controllers\Publisher\ShowroomController::class);
    Route::resource('documents', \App\Http\Controllers\Publisher\DocumentController::class);
    Route::resource('initial_registration', \App\Http\Controllers\Publisher\InitialRegisterationController::class);
    Route::get('/submit_registration', [\App\Http\Controllers\Publisher\InitialRegisterationController::class, 'register'])->name('submit_registration');
    Route::get('/approve_registration/{id}', [\App\Http\Controllers\Publisher\InitialRegisterationController::class, 'approve'])->name('approve_registration');
    //Route::resource('printmachine', \App\Http\Controllers\Publisher\PrintMachineController::class);
    Route::resource('eoiform', \App\Http\Controllers\Publisher\EOIController::class);
    Route::get('/eoiprofile', [\App\Http\Controllers\Publisher\EOIController::class, 'eoiProfile'])->name('eoiprofile');

    //review routes
    Route::resource('irc', \App\Http\Controllers\Publisher\IRCController::class);
    Route::resource('krc', \App\Http\Controllers\Publisher\KRCController::class);
    Route::resource('scf', \App\Http\Controllers\Publisher\SCFController::class);

    //noc to publisher
    Route::get('/publisher_noc', [\App\Http\Controllers\Admin\NocController::class, 'publisherNoc'])->name('publisher_noc');
    Route::get('/noc_for_publisher/{id}', [\App\Http\Controllers\Admin\NocController::class, 'NocForPublisher'])->name('noc_for_publisher');

    //royalty
    Route::resource('royalty', \App\Http\Controllers\Publisher\RoyaltyController::class);
    Route::get('/royalty_add/{id}', [\App\Http\Controllers\Publisher\RoyaltyController::class, 'royaltyAdd'])->name('royalty_add');
});

