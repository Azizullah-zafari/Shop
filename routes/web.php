<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;

use App\Http\Controllers\PaymentController;


// مسیرهای مدیریت هزینه‌ها
use App\Http\Controllers\ExpensesController;






Auth::routes(); // حتما قبل از روت‌های محافظت‌شده باشه

Route::get('/', function () {
    return view('welcome'); // صفحه اصلی
});
Route::get('/', function () {
    return redirect()->route('login');
});

// روت‌های محافظت‌شده با احراز هویت
Route::middleware(['auth'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('payments', PaymentController::class);

    Route::get('/debts', [SaleController::class, 'debts'])->name('debts');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('expenses', ExpensesController::class);
});

// اگر HomeController داری:
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
