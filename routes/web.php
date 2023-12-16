<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorizationController;

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

Route::get('/login', [AuthorizationController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthorizationController::class, 'loginStore'])->name('loginPost');
Route::get('/logout', [AuthorizationController::class, 'logout'])->name('logout');

Route::prefix('regist')->group(function () {
    Route::get('/', [AuthorizationController::class, 'showRegistration'])->name('regist');
    Route::get('/supplier', [AuthorizationController::class, 'showSupplierRegistration'])->name('regist.supplier');
    Route::post('/supplier', [AuthorizationController::class, 'registerStore'])->name('registerPost');
    Route::get('/buyer', [AuthorizationController::class, 'showBuyerRegistration'])->name('regist.buyer');
    Route::post('/buyer', [AuthorizationController::class, 'registerStore'])->name('registerPost');
});

$routes_admin = ['/admin', '/Contract', '/Buying', '/Dash', '/Category', '/Product', '/Request', '/User', '/Profile', '/Selling', '/Profile-Change'];

foreach ($routes_admin as $route) {
    Route::get($route, function () {
        return view('Admin/home');
    })->middleware('loggedIn');
}

$routes_supplier = ['/Selling-Sup', '/supplier', '/Contract-Sup', '/Dash-Sup', '/Profile-Sup', '/Inventory', '/Profile-Change-Sup'];

foreach ($routes_supplier as $route) {
    Route::get($route, function () {
        return view('Supplier/home');
    })->middleware('loggedIn');
}

$routes_buyer = ['/buyer', '/Dash-Buy', '/Profile-Buy', '/Catalogue', '/Contract-Buy', '/Catalogue-Detail', 'Transaction-Information', '/Transaction-Order'];
    
foreach ($routes_buyer as $route) {
    Route::get($route, function () {
        return view('Buyer/home');
    })->middleware('loggedIn');
}

