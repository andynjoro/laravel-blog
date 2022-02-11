<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostController;

require __DIR__.'/auth.php';

Route::get('/', [WelcomeController::class, 'index'])
    ->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('posts', PostController::class)
    ->middleware('auth')
    ->missing(function (Request $request) {
        return Redirect::route('posts.index');
    });;

