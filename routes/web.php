<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;

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

/* This is for login / registration */
Route::get('/', function () {
    return view('welcome');
});

/* This is for category */
Route::resource('/category', CategoryController::class);

/* This is for brand */
Route::resource('/brand', BrandController::class);

/* This is for product */
Route::resource('/product', ProductController::class);

/* This is for sales */
Route::resource('/sale', SalesController::class);
Route::post('/search', [SalesController::class, 'search'])->name('search');
Route::post('/sales/add', [SalesController::class, 'store'])->name('sales_add');

/* This is for dashboard */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* This is for profile */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
