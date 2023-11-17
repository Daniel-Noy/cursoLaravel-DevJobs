<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacantController;
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
})->name('home');

//? ---- Admin ----
Route::get('/dashboard', [VacantController::class, 'index'])->name('vacants.index');
Route::resource('vacants', VacantController::class)->except('index');
// Route::get('/dashboard/{vacant}/applicants', [VacantController::class, 'applicants'])->name('vacants.applicants');

//? ---- Profile ----
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/notifications', NotificationController::class)->name('notifications.index');
require __DIR__.'/auth.php';
