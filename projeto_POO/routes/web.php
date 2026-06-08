<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\QuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ============================================
// Rotas de Autenticação (sem proteção)
// ============================================
Route::middleware('guest')->group(function () {
    // Rotas de Login
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Rotas de Registro
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

// ============================================
// Rotas do Dashboard (protegidas com auth)
// ============================================
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    // CRUDs do RPG
    Route::resource('characters', CharacterController::class);
    Route::resource('items', ItemController::class);
    Route::resource('quests', QuestController::class);
});
