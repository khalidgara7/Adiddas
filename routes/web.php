<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[CategorieController::class,'index'])->name('categorie.index');
Route::get('create',[CategorieController::class,'create'])->name('categorie.create');
Route::post('/',[CategorieController::class,'store'])->name('categorie.store');
Route::delete('categorie/delete/{categorie}',[CategorieController::class,'delete'])->name('categorie.delete');
Route::get('categorie/edit/{categorie}',[CategorieController::class,'edit'])->name('categorie.edit');
Route::put('categorie/update/{categorie}',[CategorieController::class,'update'])->name('categorie.update');
Route::get('/product',[ProductController::class,'index'])->name('product.index');
