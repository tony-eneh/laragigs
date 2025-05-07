<?php

use App\Http\Controllers\GigsController;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

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

// home
Route::get('/home', function () {
    return redirect('/gigs');
})->middleware('auth');

Route::get('/', function () {
    return redirect('/gigs');
})->middleware('auth');


// gigs
Route::post('/gigs', [GigsController::class, 'store'])->middleware('auth');
Route::get('/gigs/create', [GigsController::class, 'create'])->middleware('auth');

Route::get('/gigs', [GigsController::class, 'index'])->middleware('auth');
Route::get('/gigs/{id}', [GigsController::class, 'show'])->middleware('auth');

Route::get('/gigs/{id}/edit', [GigsController::class, 'edit'])->middleware('auth');
Route::patch('/gigs/{id}', [GigsController::class, 'update'])->middleware('auth');

Route::get('/gigs/manage', [GigsController::class, 'manage'])->middleware('auth');

Route::delete('/gigs/{id}', [GigsController::class, 'destroy'])->middleware('auth');


// user
Route::get('/users', [UserController::class, 'index'])->middleware('auth');
Route::get('/users/{id}', [UserController::class, 'show'])->middleware('auth');


Route::get('/users/{id}/edit', [UserController::class, 'edit'])->middleware('auth');
Route::patch('/users/{id}', [UserController::class, 'update'])->middleware('auth');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('auth');

// auth
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest');