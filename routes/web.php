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
Route::get('/Books', [operatuerController::class, 'getAllBooks1'])->name('Books');
Route::get('/search', [cartController::class, 'search'])->name('search');
Route::get('single/Page/{book}', [operatuerController::class, 'singlePage'])->name('singlePage');

Route::post('/search-books', [cartController::class, 'searchBooks']);



// Route::get('/nav', function(){
//     return view('navbar');
// });

Route::get('/register', [userController::class, 'index'])->name('register');
Route::post('/Regester', [userController::class, 'Regester'])->name('Regester');
Route::get('/login', [userController::class, 'create'])->name('login');
Route::post('/loginOfUser', [userController::class, 'loginOfUser'])->name('loginOfUser');
Route::post('/logout', [userController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('clientDash', [DashboardsController::class, 'ClientDash'])->name('ClientDash');
    Route::post('/cart/add', [cartController::class, 'store'])->name('cart.store');
    Route::get('/getCart', [cartController::class, 'index'])->name('getCart');
    // Route::get('/total', [cartController::class, 'totalprice'])->name('total');
    Route::post('/checkout', [cartController::class, 'checkout'])->name('checkout');
    Route::get('ticket', [cartController::class, 'ticket'])->name('ticketForm');
    Route::post('/reserv-book', [operatuerController::class, 'reservBook'])->name('reservBook');
    Route::delete('cart/{cartItem}', [cartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/RateHere/{reservation}', [cartController::class, 'showRatingForm'])->name('RateHere');
    Route::post('/Rate', [cartController::class, 'rateTicket'])->name('rateTicket');

});


Route::middleware(['auth', EnsureUserHasRole::class . ':Admin'])->group(function () {
    Route::get('AdminDash', [DashboardsController::class, 'AdminDash'])->name('AdminDash');
    Route::get('CategoryForm', [categoryController::class, 'index'])->name('CategoryForm');
    Route::get('/gestion/categories', [categoryController::class, 'index1'])->name('gestionofcategories');
    Route::post('AddCategory', [categoryController::class, 'store'])->name('AddCategory');
    Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('OperatuerForm', [AdminController::class, 'index'])->name('OperatuerForm');
    Route::get('gestion/of/users', [AdminController::class, 'index1'])->name('gestionofOperatuers');
    Route::post('AddOperatuer', [AdminController::class, 'store'])->name('AddOperatuer');
    Route::delete('users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');
    Route::get('users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [AdminController::class, 'update'])->name('users.update');
});

Route::middleware(['auth', EnsureUserHasRole::class . ':Operatuer'])->group(function () {
    Route::get('OperatuerDash', [DashboardsController::class, 'OpertuerDash'])->name('OperatuerDash');
    Route::get('bookForm', [operatuerController::class, 'index'])->name('bookForm');
    Route::get('gestion/books', [operatuerController::class, 'index1'])->name('gestion_of_books');
    Route::post('addBook',[operatuerController::class, 'store'])->name('addBook');
    Route::get('books/{book}/edit', [operatuerController::class, 'edit'])->name('books.edit');
    Route::get('reserv/{book}', [operatuerController::class, 'reservationform'])->name('reservationform');
    Route::get('gettreedays', [operatuerController::class, 'gettreedays'])->name('gettreedays');
    Route::get('getisReturn', [operatuerController::class, 'isReturn'])->name('getisReturn');
    Route::get('Stock', [operatuerController::class, 'stockfinish'])->name('getStockFinish');
    // Route::post('sendMail',[operatuerController::class, 'sendMail'])->name('sendMail');
    Route::post('Addbooks/reservation',[operatuerController::class, 'addBookreserv'])->name('addReservBook');
    Route::put('books/{book}', [operatuerController::class, 'update'])->name('books.update');
    Route::put('isReturnUpdate/{id}', [OperatuerController::class, 'isReturnUpdate'])->name('isReturnUpdate');
    Route::delete('books/{book}', [operatuerController::class, 'destroy'])->name('books.destroy');
    Route::post('sendMailToAll', [operatuerController::class, 'sendMailToAll'])->name('sendMailToAll');

});



