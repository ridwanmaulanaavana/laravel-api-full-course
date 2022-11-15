<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;


trait DisableForeignKeys{

    protected function disableForeignKey(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
    }


    protected function enableForeignKeys(){
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }





}