<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     use TruncateTable, DisableForeignKeys;


    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0');
        //DB::table('users')->truncate();
        $this->disableForeignKey();
        $this->truncate('users');
        $user = \App\Models\User::factory(10)->create();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1');
        $this->enableForeignKeys();
    }
}
