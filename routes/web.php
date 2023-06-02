<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('posts.index');

// 上から順に評価されるので、通常なら/posts/createもこちらにルーティングされてしまう
// whereメソッドを使うことで、postは数値だけに制限され、こちらにルーティングされないようにできる。第二引数は正規表現
// /posts/createのルーティングを単純に順番を変えるだけでも、動くようにはなるが、あとから問題が起こることも考えられるので、whereを使っている
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->where('post', '[0-9]+');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->where('post', '[0-9]+');

// webの通信のルールで、新規ではなく一部変更の際はpatchにするようにと定められているため、patch
Route::patch('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update')->where('post', '[0-9]+');
