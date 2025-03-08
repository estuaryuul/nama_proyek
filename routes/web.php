<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use GuzzleHttp\Middleware;
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

/* 
Route::get('/', function () {
    return view('pages.products.index');
}); 
*/

Route::group(['middleware' => ['auth', 'cekrole:admin']], function () {
    Route::get('/addproduct', [ProductController::class, 'addProduction']);
    Route::post('/addproduct/store', [ProductController::class, 'store'])->name('store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});
Route::group(['middleware' => ['auth', 'cekrole:admin,user']], function () {
    Route::get('/transactions', [TransactionController::class, 'index'])->middleware('auth');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/products', [ProductController::class, 'production']);
});

Route::get('/login', [ProductController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register']);
Route::get('/listUser', [LoginController::class, 'listUser']);
Route::post('/saveregister', [LoginController::class, 'saveregister'])->name('saveregister');
