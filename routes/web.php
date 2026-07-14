<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Partner
    |--------------------------------------------------------------------------
    */

    Route::get('/partners', [PartnerController::class, 'index'])
        ->name('partners');

    Route::post('/partners/request/{id}', [PartnerController::class, 'sendRequest'])
        ->name('partner.request');

    Route::get('/partner/requests', [PartnerController::class, 'requests'])
        ->name('partner.requests');

    Route::post('/partner/accept/{id}', [PartnerController::class, 'accept'])
        ->name('partner.accept');

    Route::post('/partner/reject/{id}', [PartnerController::class, 'reject'])
        ->name('partner.reject');

    Route::get('/friends', [PartnerController::class, 'friends'])
        ->name('friends');

    /*
    |--------------------------------------------------------------------------
    | Message
    |--------------------------------------------------------------------------
    */

    Route::get('/messages', [MessageController::class, 'index'])
        ->name('messages');

    Route::post('/messages/send', [MessageController::class, 'send'])
        ->name('messages.send');

    /*
    |--------------------------------------------------------------------------
    | Study Group & Books
    |--------------------------------------------------------------------------
    */

    Route::view('/groups', 'groups')
        ->name('groups');

    Route::view('/books', 'books')
        ->name('books');
});

require __DIR__.'/auth.php';