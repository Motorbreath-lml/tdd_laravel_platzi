<?php

use App\Models\Repository;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RepositoryController;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');

// Ruta para la página de inicio welcome
// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('repositories', RepositoryController::class)->middleware('auth');