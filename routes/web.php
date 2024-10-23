<?php

use App\Http\Controllers\CreditController;
use App\Http\Controllers\PaymentController;
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

Route::get('/', [CreditController::class, 'index'])->name('credits.index');
Route::get('/credits/create', [CreditController::class, 'create'])->name('credits.create');
Route::post('/credits', [CreditController::class, 'store'])->name('credits.store');

Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
