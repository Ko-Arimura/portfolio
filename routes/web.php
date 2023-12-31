<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController; 
use App\Http\Controllers\SaleController;  
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
    // return view('welcome');
// });
Route::get('/', [PostController::class, 'index'])->name('index');
Route::get('/user/{user}',[UserController::class,'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class , 'update']);
Route::delete('/posts/{post}', [PostController::class , 'delete']);
Route::post('/posts', [PostController::class , 'store']);
Route::get('/posts/{post}', [PostController::class , 'show']);
// いいね機能
Route::get('/posts/unlike/{id}', [PostController::class , 'unlike'])->name('post.unlike');
Route::get('/posts/like/{id}', [PostController::class , 'like'])->name('post.like');
Route::get('/categories/{category}', [CategoryController::class,'index']);
// セール情報
Route::get('/sales', [SaleController::class, 'index'])->name('sales');
Route::get('/sales/create', [SaleController::class, 'create']);
Route::post('/sales', [SaleController::class, 'store']);
Route::get('/sales/{sale}', [SaleController::class ,'show']);
Route::get('/sales/{sale}/edit', [SaleController::class, 'edit']);
Route::put('/sales/{sale}', [SaleController::class, 'update']);
Route::delete('/sales/{sale}', [SaleController::class,'delete']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
