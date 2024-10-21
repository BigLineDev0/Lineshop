<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

// =================== ADMINISTRATION ==============

Route::get('/', [AdminController::class, 'index']);
Route::get('/clients', [AdminController::class, 'listClients'])->name('admin.client');
Route::delete('/clients/{user}', [AdminController::class, 'deleteClient'])->name('client.delete');

Route::get('/admins', [AdminController::class, 'listAdmins'])->name('admin.index');
Route::get('/admins/creer', [AdminController::class, 'createAdmin'])->name('admin.create');
Route::post('/admins/creer', [AdminController::class, 'storeAdmin'])->name('admin.store');
Route::get('/admins/{user}', [AdminController::class, 'editAdmin'])->name('admin.edit');
Route::put('/admins/{user}', [AdminController::class, 'updateAdmin'])->name('admin.update');
Route::delete('/admins/{user}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');

Route::get('/commandes', [AdminController::class, 'listCommandes'])->name('admin.commande');
Route::delete('/commandes/{commande}', [AdminController::class, 'deleteCommande'])->name('commande.delete');


Route::resource('/categories', CategoryController::class);
Route::resource('/produits', ProductController::class);