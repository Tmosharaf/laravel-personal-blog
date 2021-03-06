<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscriberController;

//TODO Remove this before deploy
Route::get('login-devs', function () {

    auth()->login(User::first());

    return redirect(RouteServiceProvider::HOME);
})->name('login.devs');

Route::get('/', [HomeController::class, 'index']);
Route::post('/send-contact', [ContactController::class, 'create'])->name('send.contact')->middleware('guest');
Route::get('/search', [HomeController::class, 'search'])->name('search.blog');

// BLog
Route::get('blogs/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('blogs/{id}', [BlogController::class, 'singleBlog'])->name('blogs.single');

// Blog Comment
Route::resource('comment', CommentController::class)->except('show', 'edit', 'update');
Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');

Route::post('subscribe', SubscriberController::class)->name('subscribe.store');

Route::get('blogs/category/{slug}', [HomeController::class, 'category'])->name('blogs.by.category');



Route::get('/dashboard', function () {
    return view('dashboard.home');
})->middleware(['auth'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('post', PostController::class);
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
    Route::get('contacts/{cont
    act}/markasread', [ContactController::class, 'markAsRead'])->name('contacts.markasread');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});


require __DIR__ . '/auth.php';
