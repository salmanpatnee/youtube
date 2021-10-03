<?php

use App\Http\Livewire\Video\AllVideos;
use App\Http\Livewire\Video\EditVideo;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Livewire\WatchVideo;
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

    Route::get('/videos/{channel:slug}', AllVideos::class)->name('videos.index');
    Route::get('/videos/{channel:slug}/create', CreateVideo::class)->name('videos.create');
    Route::get('/videos/{channel:slug}/edit/{video}', EditVideo::class)->name('videos.edit');
    
});


Route::get('/watch/{video}', WatchVideo::class)->name('videos.watch');