<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\JenisController;
use App\Http\Controllers\API\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'user' => UserController::class,
    'category' => CategoryController::class,
    'product' => ProductController::class,
    'jenis' => JenisController::class,
    'transaction' => TransactionController::class,
]);

Route::get('/productData', [ProductController::class, 'getProduct']);
Route::post('/updatePhoto', [UserController::class, 'updatePhoto']);
Route::get('/totalUser', [UserController::class, 'totalUser']);
Route::put('/updateProfile', [UserController::class, 'updateProfile']);
Route::put('/updateContract', [TransactionController::class, 'updateContract']);
Route::get('/contractBuyer', [TransactionController::class, 'contractBuyer']);
Route::get('/contractSupplier', [TransactionController::class, 'contractSupplier']);


