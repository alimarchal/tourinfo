<?php

use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');


    // Trip Information
    Route::controller(TripController::class)->group(function () {
        Route::get('/trips', 'index')->name('trip.index');
        Route::get('/trips/create', 'create')->name('trip.create');
        Route::post('/trips', 'store')->name('trip.store');
        Route::get('/trips/{trip}/edit', 'edit')->name('trip.edit');
        Route::put('/trips/{trip}', 'update')->name('trip.update');
        Route::delete('/trips/{trip}/destroy', 'destroy')->name('trip.destroy');


    });


Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

});
