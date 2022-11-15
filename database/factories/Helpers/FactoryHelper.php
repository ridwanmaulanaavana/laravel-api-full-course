<?php
namespace Database\Factories\Helpers;

use App\Models\Post;
use App\Models\User;


/**
 * this is function will get a random id from the database
 * @param string | hasfactory #model
 * **/
class FactoryHelper{

    public static function getRandomModelId(string $model){
         //get model count
         $count = $model::query()->count();
         if($count == 0){
             //if model count is 0
             //we should create a new record and retrive record id
             $postId = $model::factory()->create()->id;
         }else{
             //generate random number between 1 and model count
             return  rand(1,$count);
         }
    }


}