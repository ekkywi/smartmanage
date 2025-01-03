<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\ProfileController;
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

// Akses halaman register dari /register
Route::get('/register', [AuthController::class, 'register'])->name('register');

// Route untuk proses register
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

// Route untuk proses login
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

// Route untuk akses halaman dashboard -> terproteksi
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');

// Route untuk akses halaman user -> terproteksi
Route::get('/user', [UserController::class, 'user'])->name('user')->middleware('auth');

// Route untuk update user -> lewat modal -> terproteksi
Route::put('/user/update', [UserController::class, 'update'])->name('user.update')->middleware('auth');

// Route untuk delete user -> lewat modal -> terproteksi
Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.delete')->middleware('auth');

// Route untuk akses halaman aset -> terproteksi
Route::get('/aset', [AsetController::class, 'aset'])->name('aset')->middleware('auth');

// Route untuk tambah aset -> lewat modal -> terproteksi
Route::post('/aset/store', [AsetController::class, 'store'])->name('aset.store')->middleware('auth');

// Route untuk update aset -> lewat modal -> terproteksi
Route::put('/aset/update', [AsetController::class, 'update'])->name('aset.update')->middleware('auth');

// Route untuk delete aset -> lewat modal -> terproteksi
Route::delete('/aset/delete', [AsetController::class, 'destroy'])->name('aset.delete')->middleware('auth');

// Route untuk akses halaman profile -> terproteksi
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile')->middleware('auth');

// Route untuk update profile -> terproteksi
Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');

// Route untuk logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
