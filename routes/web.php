<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

Route::get('login',  [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/', [ContactController::class, 'index'])->name('contacts.index');

Route::middleware('auth')->group(function () {
	Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');
	Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');
	Route::get('contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
	Route::put('contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
	Route::get('contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
	Route::delete('contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});
