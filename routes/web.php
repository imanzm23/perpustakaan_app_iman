<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;

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
    return view('home', [
        "title" => "Home"
    ]);
});

// Route::get('/about', function () {
//     return view('about', [
//         "title" => "About",
//         "name" => "Mulyani",
//         "email" => "mulyani11052001@gmail.com",
//         "image" => "mulyani.jpg"
//     ]);
// });

// Route::get('/blog', [PostController::class, 'index']);

Route::get('/posts/{slug}', [PostController::class, 'show']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/user', UserController::class);
Route::resource('/book', BookController::class);
Route::resource('/pegawai', PegawaiController::class);