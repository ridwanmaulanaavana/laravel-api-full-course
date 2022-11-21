<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Factories\Helpers\FactoryHelper;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    use TruncateTable, DisableForeignKeys;

    public function run()
    {
        $this->disableForeignKey();
        $this->truncate('posts');

        $posts = Post::factory(200)
        //->has(Comment::factory(3,'comments'))
        //->untitled()
        ->create();    

        $posts->each(function(Post $post){
            $post->users()->sync([FactoryHelper::getRandomModelId(User::class)]);
        });


        $this->enableForeignKeys();
    }
}
