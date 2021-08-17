<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PhotoDescriptionController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;


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


Auth::routes(['register' => false]);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['role:admin'])->prefix('admin_panel')->group(function(){
    Route::get('/', [OrderController::class, 'index'])->name('homeAdmin');
});
Route::delete('/{order}',[OrderController::class, 'destroy'])->name('order.destroy');


Route::get('/about/edit', [AboutController::class, 'edit'])->name('about.edit');
Route::put('/about/update', [AboutController::class, 'update'])->name('about.update');
Route::get('/photodescription/edit', [PhotoDescriptionController::class, 'edit'])->name('photodescription.edit');
Route::put('/photodescription/update', [PhotoDescriptionController::class, 'update'])->name('photodescription.update');
Route::get('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::put('/contact/update', [ContactController::class, 'update'])->name('contact.update');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::delete('/users/{user}',[UserController::class, 'destroy'])->name('user.destroy');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::put('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{category}/update', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{category}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');






