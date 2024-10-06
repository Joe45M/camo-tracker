<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $posts = (new \App\Settings\GlobalSettings())->home_posts;
    $posts = \App\Models\Post::whereIn('id', $posts)->get();

    return view('welcome', [
        'posts' => $posts,
        'guns' => \App\Models\Gun::all(),
    ]);
});

Route::get('/dashboard', \App\Livewire\Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/category/{category}', \App\Livewire\Category::class)->middleware(['auth', 'verified'])->name('category');


Route::get('/posts/{post:id}', \App\Livewire\SinglePost::class)->name('post');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
