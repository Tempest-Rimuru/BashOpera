<?php

use App\Http\Controllers\MainController;

use Illuminate\Support\Facades\Route;
use App\Livewire\Index;
use App\Livewire\Signin;
use App\Livewire\Events;
use App\Livewire\Event;
use App\Livewire\Posts;
use App\Livewire\Post;

use App\Livewire\Admin\News;
use App\Livewire\Admin\Poster;

use App\Livewire\ModalTheater;

use Illuminate\Support\Facades\Auth;

Route::get('/', Index::class)->name('index');
Route::get('/signin', Signin::class)->name('signin');
Route::get('/events', Events::class)->name('events');
Route::get('/event/{id}', Event::class)->name('event');
Route::get('/posts', Posts::class)->name('posts');
Route::get('/post/{id}', Post::class)->name('post');



Route::get('/admin/news', News::class)->name('admin.news');
Route::get('/admin/poster', Poster::class)->name('admin.poster');

// Modals
Route::get('/modal-theater', ModalTheater::class)->name('modal-theater');

Route::post('/auth', [MainController::class, 'auth'])->name('auth');
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('index')->with('success', 'Вы вышли из аккаунта');
})->name('logout');
