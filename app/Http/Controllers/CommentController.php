<?php

namespace App\Http\Controllers;

use \App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Post $post)
    {
        $data = request()->validate([
            'comment' => 'required',
        ]);
        
        $extraData = ['user_id' => auth()->user()->id];
        $comment = $post->comments()->create(array_merge($data, $extraData));

        $timeAdded = $post->createdWhen($comment->created_at);

        return response()->json(['success' => true, 'comment' => $comment, 'timeAdded' => $timeAdded]);
    }
}
