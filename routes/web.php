<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('post', PostController::class, 'index')->name('post.index');

Route::get('post/create', PostController::class, 'create')->name('post.create');

Route::post('post/store', PostController::class, 'store')->name('post.store');

Route::get('article/{slug}', PostController::class, 'show')->name('post.show');

Route::post('comment/store', CommentController::class, 'store')->name('comment.store');

Route::post('reply/store', CommentController::class, 'replyStore')->name('reply.store');
