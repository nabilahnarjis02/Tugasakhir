<?php

use App\Http\Controllers\Api\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::resources([
    'produks' => ProdukController::class,
    'suppliers' => SupplierController::class,
    'transaksis' => TransaksiController::class,
]);