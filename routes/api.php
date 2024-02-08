<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataBarangController;
use App\Http\Controllers\DataOwnersController;
use App\Http\Controllers\KategoriStoreController;
use App\Http\Controllers\OwnerStoreController;
use App\Http\Controllers\RegisterOwrnersController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function () {
    return response()->json([
        "message" => "Akses tidak di perbolehkan",
        "status_code" => 401
    ]);
})->name("login");
//Auth
Route::post("/auth", [AuthController::class, "login"]);
//Kategori Store
Route::get("/kategori_store", [KategoriStoreController::class, "index"]);
Route::post("/kategori_store/create", [KategoriStoreController::class, "create"]);
Route::get("/kategori_store/edit/{id}", [KategoriStoreController::class, "edit"]);
Route::put("/kategori_store/update/{id}", [KategoriStoreController::class, "update"]);
Route::delete("/kategori_store/delete/{id}", [KategoriStoreController::class, "delete"]);
//Register Owners
Route::post("/register_owners", [RegisterOwrnersController::class, "register"]);
//owners
Route::get("/data_owners", [DataOwnersController::class, "index"]);
//store profile
Route::get("/owner_store", [OwnerStoreController::class, "index"]);
//Barang
Route::get("/data_barang", [DataBarangController::class, "index"])->middleware("auth:sanctum");
