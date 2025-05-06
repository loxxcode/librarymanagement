<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;


Route::get('/', [BorrowController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/create', [BookController::class, 'store'])->name('books.store');
Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/edit/{id}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/delete/{id}', [BookController::class, 'destroy'])->name('books.delete');

Route::get('/members', [MemberController::class, 'index'])->name('members.index');
Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
Route::post('/members/create', [MemberController::class, 'store'])->name('members.store');
Route::get('/members/edit/{id}', [MemberController::class, 'edit'])->name('members.edit');
Route::put('/members/edit/{id}', [MemberController::class, 'update'])->name('members.update');
Route::delete('/members/delete/{id}', [MemberController::class, 'destroy'])->name('members.delete');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
Route::post('/suppliers/create', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers/edit/{id}', [SupplierController::class, 'edit'])->name('suppliers.edit');
Route::put('/suppliers/edit/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
Route::delete('/suppliers/delete/{id}', [SupplierController::class, 'destroy'])->name('suppliers.delete');

Route::get('/borrows', [BorrowController::class, 'index'])->name('borrows.index');
Route::get('/borrows/create', [BorrowController::class, 'create'])->name('borrows.create');
Route::post('/borrows/create', [BorrowController::class, 'store'])->name('borrows.store');
Route::get('/borrows/edit/{id}', [BorrowController::class, 'edit'])->name('borrows.edit');
Route::put('/borrows/edit/{id}', [BorrowController::class, 'update'])->name('borrows.update');
Route::delete('/borrows/delete/{id}', [BorrowController::class, 'destroy'])->name('borrows.delete');

Route::get('/report', [BorrowController::class, 'report'])->name('report');

require __DIR__.'/auth.php';
