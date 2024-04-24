<?php

use App\Livewire\Counter;
use App\Livewire\CreatePost;
use App\Livewire\EditProfile;
use App\Livewire\HelloWorld;
use App\Livewire\Showposts;
use App\Livewire\Todos;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Todos::class);

Route::get('/counter', Counter::class);
Route::get('/hello-world', HelloWorld::class);
Route::get('/showposts', Showposts::class);
Route::get('/create-post', CreatePost::class);
Route::get('/edit-profile',EditProfile::class);
