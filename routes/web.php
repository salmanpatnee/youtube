<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Channel
Route::middleware(['auth'])->group(function () {
    Route::get('/channels/create', [App\Http\Controllers\ChannelController::class, 'create'])->name('channels.create');
    Route::post('/channels', [App\Http\Controllers\ChannelController::class, 'store'])->name('channels.store');
    
    Route::get('/channels/edit/{channel}', [App\Http\Controllers\ChannelController::class, 'edit'])
                                            ->name('channels.edit')
                                            ->middleware('can:update,channel');
});
