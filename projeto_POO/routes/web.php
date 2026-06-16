<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\QuestController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('characters', CharacterController::class);
    Route::resource('items', ItemController::class);
    Route::resource('quests', QuestController::class);
});

require __DIR__.'/auth.php';
