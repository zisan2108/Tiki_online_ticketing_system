<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TikiController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [AdminController::class, 'index'])->name('dashboard');

Route::get('ticket/index', [TikiController::class, 'index'])->name('ticket.index');
Route::get('create/ticket', [TikiController::class, 'create'])->name('create-ticket.index');
Route::post('store/ticket', [TikiController::class, 'store'])->name('store-ticket');
Route::get('edit/ticket/{id}', [TikiController::class, 'edit'])->name('edit-ticket');
Route::post('update/ticket/{id}', [TikiController::class, 'update'])->name('update-ticket');
Route::delete('destroy/ticket/{id}', [TikiController::class, 'destroy'])->name('destroy-ticket');

