<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth.mide'])->group(function (){

    Route::get('/',[CategorieController::class,'index'])->name('categorie.index');
    Route::get('categorie',[CategorieController::class,'create'])->name('categorie.create');
    Route::post('/store',[CategorieController::class,'store'])->name('categorie.store');
    Route::delete('categorie/delete/{categorie}',[CategorieController::class,'delete'])->name('categorie.delete');
    Route::get('categorie/edit/{categorie}',[CategorieController::class,'edit'])->name('categorie.edit');
    Route::put('categorie/update/{categorie}',[CategorieController::class,'update'])->name('categorie.update');


    Route::get('/product',[ProductController::class,'index'])->name('product.index');
    Route::get('/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/productstore',[ProductController::class,'store'])->name('product.store');
    Route::delete('product/delete/{product}',[ProductController::class,'delete'])->name('product.delete');
    Route::get('product/edit/{product}',[ProductController::class,'edit'])->name('product.edit');
    Route::put('product/update/{product}',[ProductController::class,'update'])->name('product.update');


    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/adduser', [UserController::class, 'adduser'])->name('create.user');
    Route::post('/adduser', [UserController::class, 'create']);
    Route::delete('/user/delete/{user}', [UserController::class, 'deleteUser'])->name('user.delete');
    Route::get('/user/edit/{user}', [UserController::class, 'editUsers'])->name('user.edit');
    Route::put('user/edit/{user}', [UserController::class, 'updateUsers'])->name('user.update');


    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::get('/addrole', [RoleController::class, 'addrole'])->name('create.role');
    Route::post('/addrole', [RoleController::class, 'create']);
    Route::delete('/user/delete/{role}', [RoleController::class, 'deleteRole'])->name('role.delete');
    Route::get('/role/edit/{role}', [RoleController::class, 'editRoles'])->name('role.edit');
    Route::put('role/edit/{role}', [RoleController::class, 'updateRoles'])->name('role.update');

});

Route::get('/dashboard',[ProductController::class,'showdashboard'])->name('dashboard');


Route::get('/register',[AuthenticationController::class,'showregistre'])->name('show.register');
Route::post('/register',[AuthenticationController::class, 'register'])->name('register');

Route::get('/login',[AuthenticationController::class,'showlogin'])->name('show.login');
Route::post('/login',[AuthenticationController::class,'login'])->name('login');

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/resetpwd', [AuthenticationController::class,'sendemail']);
Route::get('/sendresetpwd', [AuthenticationController::class,'sendResetPwd']);
Route::post('/rest/{token}', [AuthenticationController::class,'postrest']);



