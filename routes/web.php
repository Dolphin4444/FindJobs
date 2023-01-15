<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ControllPanelController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/create-company', [CompanyController::class, 'create'])->name('create-company');
    Route::post('/store-company', [CompanyController::class, 'store'])->name('store-company');


    Route::get('/controll-panel', [ControllPanelController::class, 'index'])->name('controll-panel');
    Route::get('/create-category', [ControllPanelController::class, 'create'])->name('create-category');
    Route::post('/store-category', [ControllPanelController::class, 'store'])->name('store-category');
});

require __DIR__.'/auth.php';
