<?php

namespace App\Repositories;

use App\Exceptions\GeneralJsonException;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository{
    public function create(array $attributes){
        //return "tes";
        $created =  DB::transaction(function () use($attributes){
            $created = Post::query()->create([
                'title' => data_get($attributes,'title','untitled'),
                'body' => data_get($attributes,'body')
            ]);
            
            // if(!$created){
            //    throw new GeneralJsonException("Failed to create a post"); 
            // }
            throw_if(!$created, GeneralJsonException::class,"Failed to create a post");

            if($userIds = data_get($attributes,'user_ids')){
                $created->users()->sync($userIds);
            }

            // $created->users()->sync($request->user_ids);
             return $created; 
        });
        

        // return new JsonResponse([
        //     'data' => $created
        // ]);
    }

    public function update($post, array $attributes){
        //$post->update($request->only(['title','body']));
        return  DB::transaction(function () use($post,$attributes){
            $updated = $post->update([
                'title' =>data_get($attributes,'title',$post->title), 
                'body' => data_get($attributes,'body'),
            ]);

            if(!$updated){
                throw new GeneralJsonException("failed to updated post"); 
                //throw new \Exception("failed to updated post");
            }


            if($userIds = data_get($attributes,'user_ids')){
                $post->users()->sync($userIds);
            }

            return $updated;
        });

    }

    public function forceDelete($post){
        return DB::transaction(function () use ($post) {
            $deleted = $post->forceDelete();


            if($deleted){
                throw new GeneralJsonException("cannot deleted post");
                //throw new \Exception("cannot deleted post");
            }
            return $deleted;
        });
    }
}