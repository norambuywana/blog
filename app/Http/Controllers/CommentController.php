<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    // Store created comment
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'author' => 'max:255',
                'body' => 'required|max:350',
                'post_id' => 'required|integer'
            ]
        );

        Comment::create(['author' => $request->input('author'), 'body' => $request->input('body'), 'post_id' => $request->input('post_id')]);
        
        return redirect()->route('post', ['id' => $request->input('post_id')]);
    }
}
