<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\VendorAuthenticationController;
use App\Http\Controllers\Vendors\vendorDahboard;
 

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
Route::get('/login', [UserAuthController::class, 'login'])->name('login');


// les route register et login doit etre appeler lorsque l'utilisateur n'est pas connecté

Route::middleware(['guest'])->group(function () {

    //Inscription
    Route::get('/register', [UserAuthController::class, 'register'])->name('user.register');
    Route::post('/register', [UserAuthController::class, 'handleUserRegister'])->name('handleUserRegister');

    //Connexion

    Route::get('/login', [UserAuthController::class, 'login'])->name('user.login');
    Route::post('/login', [UserAuthController::class, 'handleUserLogin'])->name('handleUserLogin'); 
});


    // Route pour les utilisateur connectés
Route::middleware(['auth'])->group(function () {
    
    //Déconnexion
    Route::get('/logout', [UserAuthController::class, 'handleLogout'])->name('user.logout');

});

//Route pour les vendeurs

Route::prefix('vendors/accounts')->group(function() {

    Route::get('/login', [VendorAuthenticationController::class, 'login'])->name('vendors.login');
    Route::post('/login', [VendorAuthenticationController::class, 'handleLogin'])->name('vendors.handleLogin'); 

    Route::get('/register', [VendorAuthenticationController::class, 'register'])->name('vendors.register');
    Route::post('/register', [VendorAuthenticationController::class, 'handleRegister'])->name('vendors.handleRegister');


});


Route::middleware('vendor_middleware')->prefix('vendors/dashboard')->group(function() {

    Route::get('/', [VendorDahboard::class, 'index'])->name('vendors.dashboard');
    Route::get('/logout', [VendorDahboard::class, 'logout'])->name('vendors.logout');

});

