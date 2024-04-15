<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GetCrudsController;
use App\Http\Controllers\CursosController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});




Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/crear-crud', [GetCrudsController::class, 'addData']);
Route::get('/getData', [GetCrudsController::class, 'getData']);
Route::post('/deleteData', [GetCrudsController::class, 'deleteData']);

Route::middleware('auth')->group(function () {
    Route::get('/gestiocursos', [CursosController::class, 'gestioCursos']);
    Route::post('/addcurs', [CursosController::class, 'addcurs']);

});



require __DIR__.'/auth.php';
