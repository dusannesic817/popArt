<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [HomeController::class,'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Products
Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
Route::post('/products/create', [ProductController::class,'store'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->where('product', '[0-9]+')
    ->name('products.show');


//Categories
Route::get('/categories/{parent}/children', [CategoryController::class, 'getChildren']);
Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->where('category', '[0-9]+')
    ->name('categories.show');





require __DIR__.'/auth.php';

