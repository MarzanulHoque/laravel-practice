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
use App\Http\Controllers\PostCommentsController ;


Route::get('ping',function()
{
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us21'
    ]);

    $response = $mailchimp->lists->getList('326be16edf');
    ddd($response);

});


Route::get('/', [PostsController::class ,'index'])->name('home') ;
Route::get('/posts/{post:slug}', [PostsController::class ,'show'] );

Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class ,'create'] )->middleware('guest');
Route::post('register', [RegisterController::class ,'store'] )->middleware('guest');

Route::get('login', [SessionsController::class ,'create'] )->middleware('guest');
Route::post('login', [SessionsController::class ,'store'] )->middleware('guest');

Route::post('logout', [SessionsController::class ,'destroy'] )->middleware('auth');


