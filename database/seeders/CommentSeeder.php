<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
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
        $this->truncate('comments');

        Comment::factory(3)->create();    


        $this->enableForeignKeys();
    }
}
