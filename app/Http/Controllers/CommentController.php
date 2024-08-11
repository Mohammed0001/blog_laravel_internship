<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\comment;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorecommentRequest;
use App\Http\Requests\UpdatecommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Post $post)
    // {
    //     return
    // }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecommentRequest $request)
    {
        $comment = Auth::user()->comments()->create($request->validated());
        // $post->load('user:id,name');
        return $comment;
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $comment)
    {
        return $comment->load('user:id,name');

    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecommentRequest $request, comment $comment)
    {
        if ($comment->user_id != Auth::id()) {
            abort(403, 'You are not authorized to view this post');
        }

        $comment->update($request->validated());
        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        if ($comment->user_id != Auth::id()) {
            abort(403, 'You are not authorized to view this post');
        }
        $comment->delete();
        return ["message" => "Comment deleted successfully"];
    }
}
