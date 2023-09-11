<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
// use App\Models\USer;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){

        return view('posts.index',[
            'posts' => Post::latest()->filter(
                request(['search','category','author']))
                ->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
         return view('posts.show',[

            'post' => $post

        ]);
    }
}
