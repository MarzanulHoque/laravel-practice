<?php

 namespace App\Models;

 use Illuminate\Database\Eloquent\ModelNotFoundException;
 use Illuminate\Support\Facades\File;
 use Spatie\YamlFrontMatter\YamlFrontMatter;

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


    public static function all()

    {

        return cache()->rememberForever('posts.all', function () {

        return collect(File::files(resource_path("posts")))
        ->map(fn($file)=>YamlFrontMatter::parseFile($file))
        ->map(fn($document)=> new Post(

                $document->title,
                $document->excerpt,
                $document->date,
                $document->slug,
                $document->body()
           )
        )
        ->sortBy('date');

        });

    }
    public static function find($slug)
    {
        return static::all()->firstWhere('slug',$slug);

    }

    public static function findOrFail($slug)
    {
        $post = static::find($slug);

        if(! $post){
            throw new ModelNotFoundException();
        }

        return $post;

    }


 }
