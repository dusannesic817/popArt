<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\ProfileController;



Route::get('/', [HomeController::class,'index'])->name('home');
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', AdminProductController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::get('subcategories/create', [AdminCategoryController::class, 'subcategory'])->name('categories.subcategory');
    Route::post('subcategories/create', [AdminCategoryController::class, 'storeSubcategory'])->name('categories.storeSubcategory');
    Route::resource('customers', AdminCustomerController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Products
Route::middleware(['auth'])->group(function () {
    Route::get('/products/create', [ProductController::class,'create'])->name('products.create');
    Route::post('/products/create', [ProductController::class,'store'])->name('products.store');
    Route::get('/products/edit/{product}', [ProductController::class,'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class,'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class,'destroy'])->name('products.destroy');
});
Route::get('/products/{product}', [ProductController::class, 'show'])->where('product', '[0-9]+')->name('products.show');


//Categories
Route::get('/categories/{parent}/children', [CategoryController::class, 'getChildren']);
Route::get('/categories/{category}', [CategoryController::class, 'show'])->where('category', '[0-9]+')->name('categories.show');



require __DIR__.'/auth.php';

