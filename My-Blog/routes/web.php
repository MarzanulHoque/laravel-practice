<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\PostsController ;
use App\Http\Controllers\RegisterController ;
use App\Http\Controllers\SessionsController ;


Route::get('/', [PostsController::class ,'index'])->name('home') ;
Route::get('/posts/{post:slug}', [PostsController::class ,'show'] );

Route::get('register', [RegisterController::class ,'create'] )->middleware('guest');
Route::post('register', [RegisterController::class ,'store'] )->middleware('guest');

Route::post('logout', [SessionsController::class ,'destroy'] );


