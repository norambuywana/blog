<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\BlogPost;

class PostController extends Controller
{
    // All posts
    public function index()
    {
        // Get all post with user info ordered by date
        $data['posts'] = Post::orderBy('created_at', 'desc')->with('user')->get();
        
        return view('home', $data);
    }

    // Get create post view
    public function create()
    {
        return view('posts/create');
    }

    // Save create post
    public function store(BlogPost $request)
    {
        // Validated and sanitize input
        $validated = $request->validated();

        // Get id of current user
        $user_id = $request->user()->id;

        Post::create(['title' => $validated['title'], 'body' => $validated['body'], 'user_id' => $user_id]);

        return view('posts/create');
    }

    // Show single post
    public function show(int $id)
    {
        // Get post object with user and comments
        $data['post'] = Post::with('user','comments')->find($id);

        return view('posts/show', $data);
    }
}
