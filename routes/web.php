<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriberController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

Route::get('login-devs', function () {

    auth()->login(User::first());

    return redirect(RouteServiceProvider::HOME);
})->name('login.devs');

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard.home');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class)->except('show');
    Route::post('subscribe', SubscriberController::class)->name('subscribe.store');
    Route::resource('post', PostController::class);
});


require __DIR__ . '/auth.php';
