<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\FormationController;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
/*******Compte Routes********/
Route::get('/comptes', [CompteController::class, 'index'])->name('comptes.index');
Route::post('/comptes', [CompteController::class, 'store'])->name('comptes.store');
Route::get('/comptes/create', [CompteController::class, 'create'])->name('comptes.create');
Route::put('/comptes/{compte}', [CompteController::class, 'update'])->name('comptes.update');
Route::delete('/comptes/{compte}', [CompteController::class, 'destroy'])->name('comptes.destroy');
Route::get('/comptes/{compte}/edit', [CompteController::class, 'edit'])->name('comptes.edit');

/*******Formation Routes********/
Route::get('/formations', [FormationController::class, 'index'])->name('formations.index');
Route::post('/formations', [FormationController::class, 'store'])->name('formations.store');
Route::get('/formations/create', [FormationController::class, 'create'])->name('formations.create');
Route::put('/formations/{formation}', [FormationController::class, 'update'])->name('formations.update');
Route::delete('/formations/{formation}', [FormationController::class, 'destroy'])->name('formations.destroy');
Route::get('/formations/{formation}/edit', [FormationController::class, 'edit'])->name('formations.edit');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
