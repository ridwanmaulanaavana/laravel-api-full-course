<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\User;
use App\Events\Models\Users\UserCreated;
use App\Events\Models\Users\UserDeleted;
use App\Events\Models\Users\UserUpdated;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralJsonException;

class UserRepository extends BaseRepository{

    public function create(array $attributes){
        $created =  DB::transaction(function () use($attributes){
            $created = User::query()->create([
                'name' => data_get($attributes,'name'),
                'email' => data_get($attributes,'email')
            ]);
            
            // if(!$created){
            //    throw new GeneralJsonException("Failed to create a post"); 
            // }
            throw_if(!$created, GeneralJsonException::class,"Failed to create a user");
            event(new UserCreated($created));
            // if($userIds = data_get($attributes,'post_ids')){
            //     $created->posts()->sync($userIds);
            // }

            // $created->users()->sync($request->user_ids);
             return $created; 
        });
    }

    public function update($user, array $attributes){
        return DB::transaction(function () use ($user, $attributes){
            $updated = $user->update([
                'name'=>data_get($attributes,'name',$user->name),
                'email' => data_get($attributes,'email',$user->email),
            ]);

            throw_if(!$updated,GeneralJsonException::class,'User Cannot updated');
            event(new UserUpdated($user));
            return $updated;
        });
    }

    public function forceDelete($user){
        return DB::transaction(function () use ($user){
            $deleted = $user->forceDelete();
            throw_if($deleted,GeneralJsonException::class,'cannot deleted');
            event(new UserDeleted($user));
            return $deleted;
        });
    }


}