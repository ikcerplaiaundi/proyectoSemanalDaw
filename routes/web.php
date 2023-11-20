<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RankingController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //CRUD RANKING
    Route::post('/guardar', [RankingController::class, 'store']);
    Route::get('/dashboard', [RankingController::class, 'indexMine'])->name('dashboard');
    Route::post('/update', [RankingController::class, 'update'])->name('update');
    Route::delete('/delete/{ranking}', [RankingController::class, 'destroy'])->name('delete');
});

require __DIR__.'/auth.php';
