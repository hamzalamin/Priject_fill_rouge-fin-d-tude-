<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\orderController;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\operatuerController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\ReservationController;

// Route::get('/', function () {
//     return view('w   elcome');
// });
Route::get('/', [operatuerController::class, 'getAllBooks'])->name('home');

Route::get('/register', [userController::class, 'index'])->name('register');
Route::post('/Regester', [userController::class, 'Regester'])->name('Regester');
Route::get('/login', [userController::class, 'create'])->name('login');
Route::post('/loginOfUser', [userController::class, 'loginOfUser'])->name('loginOfUser');
Route::post('/logout', [userController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('clientDash', [DashboardsController::class, 'ClientDash'])->name('ClientDash');
    Route::get('OperatuerDash', [DashboardsController::class, 'OpertuerDash'])->name('OperatuerDash');
    Route::post('/cart/add', [cartController::class, 'store'])->name('cart.store');
    Route::get('/getCart', [cartController::class, 'index'])->name('getCart');
    Route::get('/total', [cartController::class, 'totalprice'])->name('total');
    Route::post('/checkout', [orderController::class, 'checkout'])->name('checkout');
});


Route::middleware(['auth', EnsureUserHasRole::class . ':Admin'])->group(function () {
    Route::get('AdminDash', [DashboardsController::class, 'AdminDash'])->name('AdminDash');
    Route::get('CategoryForm', [categoryController::class, 'index'])->name('CategoryForm');
    Route::post('AddCategory', [categoryController::class, 'store'])->name('AddCategory');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('OperatuerForm', [AdminController::class, 'index'])->name('OperatuerForm');
    Route::post('AddOperatuer', [AdminController::class, 'store'])->name('AddOperatuer');

});

Route::middleware(['auth', EnsureUserHasRole::class . ':Operatuer'])->group(function () {
    Route::get('bookForm', [operatuerController::class, 'index'])->name('bookForm');
    Route::post('addBook',[operatuerController::class, 'store'])->name('addBook');
    Route::get('books/{book}/edit', [operatuerController::class, 'edit'])->name('books.edit');
    Route::put('books/{book}', [operatuerController::class, 'update'])->name('books.update');
    Route::delete('books/{book}', [operatuerController::class, 'destroy'])->name('books.destroy');
});



