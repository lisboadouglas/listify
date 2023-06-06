<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\UserController;

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
    Route::get("listas", [ApiController::class, "ListTheLists"]);
    Route::get("listar/{id}", [ApiController::class, "getSingleList"]);
    Route::post("lista/new", [ApiController::class, "CreateLists"]);
    Route::put("lista/update/{id}", [ApiController::class, "updateList"]);
    Route::delete("lista/delete/{id}", [ApiController::class, "deleteList"]);
});