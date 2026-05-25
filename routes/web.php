<?php

use App\Http\Controllers\ChecklistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\FaultController;
use App\Http\Controllers\SearchController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/checklist', [ChecklistController::class, 'index'])->name('checklist.index');
Route::post('/checklist', [ChecklistController::class, 'store'])->name('checklist.store');
Route::get('/checklist/history/{days?}', [ChecklistController::class, 'history'])->name('checklist.history');
Route::get('/specifications', [HomeController::class, 'specs'])->name('specs');
Route::get('/safety', [HomeController::class, 'safety'])->name('safety');
Route::get('/chapters', [HomeController::class, 'chapters'])->name('chapters');
Route::get('/guide', [GuideController::class, 'index'])->name('guide');
Route::get('/search', [SearchController::class, 'global'])->name('search.global');
Route::get('/faults/{fault}/edit', [FaultController::class, 'edit'])->name('faults.edit');

Route::resource('faults', FaultController::class);
