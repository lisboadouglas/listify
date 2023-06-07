<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ListsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// API Routes de Listify
Route::post("register", [UserController::class, "register"]);
Route::post("login", [UserController::class, "login"]);

Route::group(['middleware' => ["auth:sanctum"]], function(){
    Route::get("profile", [UserController::class, "profile"]);
    Route::get("listas", [ListsController::class, "index"]);
    Route::get("listar/{id}", [ListsController::class, "show"]);
    Route::post("lista/new", [ListsController::class, "store"]);
    Route::put("lista/update/{id}", [ListsController::class, "update"]);
    Route::delete("lista/delete/{id}", [ListsController::class, "delete"]);
});