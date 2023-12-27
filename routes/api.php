<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PegawaiController;

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

Route::resource('/users', UserController::class);

Route::get('pegawai', [PegawaiController::class , 'read']);
Route::get('pegawai/show/{id}', [PegawaiController::class , 'show']);
Route::post('pegawai/store', [PegawaiController::class , 'store']);
Route::put('pegawai/update/{id}', [PegawaiController::class , 'update']);
Route::delete('pegawai/destroy/{id}', [PegawaiController::class , 'destroy']);

Route::get('book', [BookController::class , 'read']);
Route::get('book/show/{id}', [BookController::class , 'show']);