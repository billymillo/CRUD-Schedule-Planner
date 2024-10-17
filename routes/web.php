<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\MoneyController;

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
Route::get('/', [LandingPageController::class, 'index'])->name('landing_page');
Route::prefix('/planner')->name('planner.')->group(function(){
    Route::get('/table', [ScheduleController::class, 'index'])->name('table');
    Route::get('/schedule', [ScheduleController::class, 'create'])->name('add.form');
    Route::post('/add-schedule', [ScheduleController::class, 'store'])->name('addto.schedule');
    Route::get('/edit/{id}', [ScheduleController::class,'edit'])->name('edit.schedule');
    Route::patch('/update/{id}', [ScheduleController::class,'update'])->name('update');
    Route::delete('/hapus/{id}', [ScheduleController::class, 'destroy'])->name('hapus');
});
Route::prefix('/spend')->name('spend.')->group(function(){
    Route::get('/table', [MoneyController::class, 'index'])->name('money');
    Route::get('/form', [MoneyController::class, 'create'])->name('add.form');
    Route::post('/create', [MoneyController::class, 'store'])->name('add.table');
    Route::get('/edit/{id}', [MoneyController::class, 'edit'])->name('edit.form');
    Route::patch('/update/{id}', [MoneyController::class, 'update'])->name('update.form');
    Route::delete('/delete/{id}', [MoneyController::class, 'destroy'])->name('delete');
});
