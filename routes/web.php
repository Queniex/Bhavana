<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/login', [UserController::class, 'showLogin'])->name('login');

Route::prefix('regist')->group(function () {
    Route::get('/', [UserController::class, 'showRegistration'])->name('regist');
    Route::get('/supplier', [UserController::class, 'showSupplierRegistration'])->name('regist.supplier');
    Route::get('/buyer', [UserController::class, 'showBuyerRegistration'])->name('regist.buyer');
});

$routes_admin = ['/admin', '/Contract', '/Buying', '/Dashboard', '/Category', '/Product', '/Request', '/User', '/Profile', '/Selling'];

foreach ($routes_admin as $route) {
    Route::get($route, function () {
        return view('Admin/home');
    });
}

$routes_supplier = ['/supplier', '/Contract', '/Buying', '/Dashboard', '/Category', '/Product', '/Request', '/User', '/Profile', '/Selling'];

foreach ($routes_supplier as $route) {
    Route::get($route, function () {
        return view('Supplier/home');
    });
}

