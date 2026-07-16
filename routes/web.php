<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupMessageController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MaterialCommentController;


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


    Route::get('/groups',[GroupController::class,'index'])
    ->name('groups');

    Route::post('/groups/create',[GroupController::class,'store'])
        ->name('groups.store');

    Route::post('/groups/{id}/join',[GroupController::class,'join'])
        ->name('groups.join');

    Route::post('/groups/{id}/leave',[GroupController::class,'leave'])
        ->name('groups.leave');

    Route::get('/groups/{group}', [GroupController::class, 'show'])
    ->name('groups.show');

    Route::post('/groups/{group}/message', [GroupMessageController::class,'store'])
    ->name('groups.message');

    Route::post('/groups/{group}/materials',[MaterialController::class,'store'])
        ->name('materials.store');

    Route::get('/materials/{material}',[MaterialController::class,'download'])
        ->name('materials.download');

    Route::post(
        '/materials/{material}/comment',
        [MaterialCommentController::class,'store'])->name('materials.comment');

});

require __DIR__.'/auth.php';