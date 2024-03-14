<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;


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

//Inscription
Route::get('/register', [UserAuthController::class, 'register'])->name('user.register');
Route::post('/register', [UserAuthController::class, 'handleUserRegister'])->name('handleUserRegister');

//Connexion

Route::get('/login', [UserAuthController::class, 'login'])->name('user.login');
Route::post('/login', [UserAuthController::class, 'handleUserLogin'])->name('handleUserLogin');
