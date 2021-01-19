<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', [HomeController::class, 'showhome']);
Route::get('produk1', [HomeController::class, 'showproduk1']);
Route::get('checkout', [HomeController::class, 'showcheckout']);
Route::get('about', [HomeController::class, 'showabout']);
Route::get('blog', [HomeController::class, 'showblog']);
Route::get('contact', [HomeController::class, 'showcontact']);
Route::get('cart', [HomeController::class, 'showcart']);

Route::get('dashboard', [HomeController::class, 'showdashboard']);
Route::get('dashboard/{status}', [HomeController::class, 'showdashboard']);
Route::get('kategori', [HomeController::class, 'showkategori']);

Route::get('setting', [SettingController::class, 'index']);
Route::post('setting', [SettingController::class, 'store']);

Route::post('produk1/filter', [ProdukController::class, 'filter']);

Route::get('test/{produk}/{hargaMin?}/{hargaMax?}', [ProdukController::class, 'test']);

Route::prefix('admin')->middleware('auth')->group(function(){

	Route::post('produk/filter', [ProdukController::class, 'filter']);

	Route::get('user', [UserController::class, 'index']);
	Route::get('user/create', [UserController::class, 'create']);
	Route::post('user', [UserController::class, 'store']);
	Route::get('user/{user}', [UserController::class, 'show']);
	Route::get('user/{user}/edit', [UserController::class, 'edit']);
	Route::put('user/{user}', [UserController::class, 'update']);
	Route::delete('user/{user}', [UserController::class, 'destroy']);

	Route::get('produk', [ProdukController::class, 'index']);
	Route::get('product', [ProductController::class, 'index']);
	Route::get('produk/create', [ProdukController::class, 'create']);
	Route::post('produk', [ProdukController::class, 'store']);
	Route::get('produk/{produk}', [ProdukController::class, 'show']);
	Route::get('produk/{produk}/edit', [ProdukController::class, 'edit']);
	Route::put('produk/{produk}', [ProdukController::class, 'update']);
	Route::delete('produk/{produk}', [ProdukController::class, 'destroy']);

	
});

Route::get('login', [AuthController::class, 'showlogin']);
Route::post('login', [AuthController::class, 'loginProcess'])->name('login');
Route::get('logout', [AuthController::class, 'logout']);
Route::get('register', [AuthController::class, 'showRegister']);

Route:: get('test-collection', [ProdukController::class, 'testCollection']);