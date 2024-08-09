<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{

    public function index()
    {
        //
        // Post::all(); not the best practice because it does not allow other functions
        return Post::get();
    }


    public function store(StorePostRequest $request)
    {
        Post::create($request->validated());
        return ["message" => "post created successfully"];

    }

    public function show(Post $post)
    {
        return $post;
    }

    public function showUserPosts($userID)
    {
        $post = Post::where('post_owner_id', $userID)->get();
        // if($post == null){
        //     return ["message" => "no posts found for this user"];
        // }
        return $post;
    }


    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return $post;

    }


    public function destroy(Post $post)
    {
        $post->delete();
        return ["message" => "post deleted successfully"];
    }
}
