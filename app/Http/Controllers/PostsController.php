<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    public function index()
    {
    	// $posts = Post::all();
        $posts = Post::orderBy('id', 'desc')->paginate(10);
    	return view('posts.index')->with(['posts' => $posts]);
    }

    public function show(Post $post)
    {
    	return view('posts.show')->with(['post' => $post]);
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        // Una forma de crear un registro
        // $post = new Post;
        // $post->title = $request->get('title');
        // $post->description = $request->get('description');
        // $post->url = $request->get('url');
        // $post->save();

        $post = Post::create($request->only('title', 'description', 'url'));

        return redirect()->route('posts_path');
    }
}
