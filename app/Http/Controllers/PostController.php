<?php

namespace App\Http\Controllers;

use App\Exceptions\GeneralJsonException;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function index(Request $request)
    {
        //throw new GeneralJsonException("some errors",422);
        
        //abort(404);
        $pageSize= $request->page_size ?? 20;
        $posts = Post::query()->paginate($pageSize);
        return new JsonResponse([
            'data' => $posts
        ]);
        // $posts = Post::query()->get();
        // return new PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request,PostRepository $repository)
    {
        $created = $repository->create($request->only([
            'title',
            'body',
            'user_ids',
        ]));
        // //return "tes";
        // $created =  DB::transaction(function () use($request){
        //     $created = Post::query()->create([
        //         'title' => $request->title,
        //         'body' => $request->body
        //     ]);
    
        //     $created->users()->sync($request->user_ids);
        //     return $created; 
        // });
        

        // return new JsonResponse([
        //     'data' => $created
        // ]);
        return new PostResource($created);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Post $post)
    {
        // return new JsonResponse([
        //     'data' => $post
        // ]);

        return new PostResource($post);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Post $post, PostRepository $repository)
    {

        $post = $repository->update($post,$request->only([
            'title',
            'body',
            'user_ids',
        ]));
        return "success";
       // return new PostResource($post);

        // return "heya";
        // $post->update($request->only(['title','body']));
        // $update = $post->update([
        //     'title' => $request->title ?? $post->title,
        //     'body' => $request->body ?? $post->body,
        // ]);
        

        // if(!$update){
        //     return new JsonResponse([
        //         'errors' =>[
        //             'failed to update model.'
        //         ]
        //     ],400);
        // }
        // return new JsonResponse([
        //     'data' => $update
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, PostRepository $repository)
    {
        $post = $repository->forceDelete($post);
        return new PostResource($post);
        // $deleted = $post->forceDelete();

        // if(!$deleted){
        //     return new JsonResponse([
        //         'errors' =>'could not be resource'
        //     ],400);
        // }

        // return new JsonResponse([
        //     'data' => $deleted
        // ]);

    }
}

