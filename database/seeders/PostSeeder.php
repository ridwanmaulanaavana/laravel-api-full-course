<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
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

        Post::factory(3)->untitled()->create();    


        $this->enableForeignKeys();
    }
}
