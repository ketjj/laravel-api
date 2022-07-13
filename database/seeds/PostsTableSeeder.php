<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($i = 0; $i < 40; $i++){
            $new_post = new Post();
            $new_post->title = 'Post for Today';
            $new_post->slug = Post::SlugGen($new_post->title );
            $new_post->content = $faker->text(200);
            $new_post->image = $faker->imageUrl(640, 480, 'posts');
            $new_post->author = $faker->lastName();
            $new_post->save();
        }
    }
}
