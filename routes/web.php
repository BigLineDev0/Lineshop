<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PaymentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'doLogin']);

Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');;

Route::post('/register', [AuthController::class, 'customRegister'])->name('customRegister');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Client
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');

Route::get('/produit/{slug}', [HomeController::class, 'show'])->name('show');

Route::get('/shop/categorie/{slug}', [HomeController::class, 'filtreByCategory'])->name('shop.category');

Route::get('/panier', [HomeController::class, 'showCart'])->name('cart');

// Panier
Route::resource('panier', PanierController::class);

// Commande
Route::get('/commande', [CommandeController::class, 'checkout'])->name('checkout')->middleware('auth');

Route::post('/commande', [CommandeController::class, 'validatedCheckout'])->name('validatedCheckout');

Route::get('/confirmation', [CommandeController::class, 'confirm'])->name('confirm');

Route::get('/paiement-en-ligne/{reference}', [PaymentController::class, 'payement'])->name('payement');


