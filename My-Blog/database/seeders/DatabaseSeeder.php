<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' =>'personal'

        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' =>'family'

        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' =>'work'

        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id' => $family->id,
            'title'=>'My Family Post',
            'excerpt' => 'lorem ipsum dolor sit amet.',
            'slug'=>'my-family-post',
            'body'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis molestias fugit fuga quis eveniet iure? Possimus, corporis atque! Perspiciatis facere ullam similique delectus suscipit rerum quo numquam reprehenderit praesentium dignissimos veniam libero totam mollitia est, iusto debitis molestiae? Officiis ipsam veritatis, magni quam id totam commodi eum omnis recusandae placeat natus, inventore minus assumenda asperiores qui excepturi dolores labore quas corporis accusantium consequatur ratione? Temporibus, corrupti atque. Corrupti recusandae soluta saepe quis ab, reiciendis officiis hic veniam vel ut odit. Eaque quaerat, rerum vitae culpa fugit eum corporis obcaecati. Voluptates enim corrupti porro est voluptatibus provident reprehenderit! Quisquam, magnam cupiditate.'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id' => $work->id,
            'title'=>'My Work Post',
            'excerpt' => 'lorem ipsum dolor sit amet.',
            'slug'=>'my-work-post',
            'body'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officiis molestias fugit fuga quis eveniet iure? Possimus, corporis atque! Perspiciatis facere ullam similique delectus suscipit rerum quo numquam reprehenderit praesentium dignissimos veniam libero totam mollitia est, iusto debitis molestiae? Officiis ipsam veritatis, magni quam id totam commodi eum omnis recusandae placeat natus, inventore minus assumenda asperiores qui excepturi dolores labore quas corporis accusantium consequatur ratione? Temporibus, corrupti atque. Corrupti recusandae soluta saepe quis ab, reiciendis officiis hic veniam vel ut odit. Eaque quaerat, rerum vitae culpa fugit eum corporis obcaecati. Voluptates enim corrupti porro est voluptatibus provident reprehenderit! Quisquam, magnam cupiditate.'
        ]);



    }
}
