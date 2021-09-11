<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\Admin\PostCommentController as AdminPostCommentController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')->middleware(['auth', 'roleChecker'])->group(function (){
    Route::resource('roles', RoleController::class);
    Route::resource('posts', PostController::class);
    Route::resource('users', UserController::class);
    Route::get('post/{post}/comments', [AdminPostCommentController::class, 'comments'])->name('post.comments');
    Route::get('post/comments/{comment}/edit', [AdminPostCommentController::class, 'edit'])->name('post.comments.edit');
    Route::put('post/comments/{comment}/update', [AdminPostCommentController::class, 'update'])->name('post.comments.update');
    Route::delete('post/comments/{comment}', [AdminPostCommentController::class, 'destroy'])->name('post.comments.destroy');
});

Route::get('/', [\App\Http\Controllers\HomePageController::class, 'index']);
Route::get('post/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::post('post/{id}/save-comment', [PostCommentController::class, 'save'])->name('post.save-comment');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
