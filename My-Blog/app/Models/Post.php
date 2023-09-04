<?php

 namespace App\Models;

 use Illuminate\Database\Eloquent\ModelNotFoundException;
 use Illuminate\Support\Facades\File;

 class Post{

    public $title;
    public $excerpt;
    public $body;
    public $date;
    public $slug;

    public function __construct($title , $excerpt, $date , $slug, $body )
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body;
    }


    public static function find($slug)
    {

        $path = resource_path("posts/{$slug}.html");

        if(!file_exists($path))
        {
            throw new ModelNotFoundException();

        }

        return cache()->remember("posts.{$slug}",5, fn() => file_get_contents($path));


    }

    public static function all()
    {
        $files = File::files(resource_path("posts/"));

       return array_map(fn($file)=> $file -> getContents() , $files);
    }

 }
