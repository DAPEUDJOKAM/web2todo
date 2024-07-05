<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TodoCategoryController;
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

Route::get('/about', function () {
    return view('about');
});

Route::prefix('user')->group(function () {
    // Authentication routes
    Route::get('/register', [UserController::class, 'register'])->name('user.register');
    Route::post('/register/store', [UserController::class, 'storeRegister'])->name('user.storeRegister');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login/auth', [UserController::class, 'loginAuth'])->name('user.loginAuth');
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');

    // CRUD operations for authenticated users
    Route::get('/userview', [UserController::class, 'index'])->name('user.index')->middleware('auth');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');
});
Route::prefix('todocategories')->middleware('auth')->group(function () {
    Route::get('/', [TodoCategoryController::class, 'index'])->name('todocategories.index');
    Route::get('/create', [TodoCategoryController::class, 'create'])->name('todocategories.create');
    Route::post('/store', [TodoCategoryController::class, 'store'])->name('todocategories.store');
    Route::get('/{todoCategory}/edit', [TodoCategoryController::class, 'edit'])->name('todocategories.edit');
    Route::put('/{todoCategory}', [TodoCategoryController::class, 'update'])->name('todocategories.update');
    Route::delete('/{todoCategory}', [TodoCategoryController::class, 'destroy'])->name('todocategories.destroy');
});
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
});

Route::prefix('todo')->group(function () {
    Route::get('/', [TodoController::class, 'index']);
    Route::get('/create', [TodoController::class, 'create']);
    Route::get('/edit/{id}', [TodoController::class, 'edit']);
    Route::get('/delete/{id}', [TodoController::class, 'destroy']);
    Route::post('/store', [TodoController::class, 'store']);
    Route::post('/update/{id}', [TodoController::class, 'update']);
});

Route::prefix('todolist')->group(function () {
    Route::get('/', [TodoListController::class, 'index']);
    Route::get('/delete/{id}', [TodoListController::class, 'destroy']);
    Route::post('/store', [TodoListController::class, 'store']);
    Route::post('/update/{id}', [TodoListController::class, 'update']);
});
