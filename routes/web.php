<?php

use App\Http\Controllers\AuthController;
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

// Akses halaman login dari / di redirrect ke /login
Route::get('/', [AuthController::class, 'index'])->name('index');

// Akses halaman login dari /login
Route::get('/login', [AuthController::class, 'login'])->name('login');

//Akses halaman register dari /register
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::get('/app', [AuthController::class, 'app'])->name('app');
