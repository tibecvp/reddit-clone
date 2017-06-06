<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

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
        $post = new Post;
    	return view('posts.create')->with(['post' => $post]);
    }

    public function store(CreatePostRequest $request)
    {
        // Una forma de crear un registro
        // $post = new Post;
        // $post->title = $request->get('title');
        // $post->description = $request->get('description');
        // $post->url = $request->get('url');
        // $post->save();
        $post = new Post;

        $post->fill($request->only('title', 'description', 'url'));
        $post->user_id = auth()->user()->id;
        $post->save();

        session()->flash('message', 'Post Created!');

        return redirect()->route('posts_path');
    }

    public function edit(Post $post)
    {
        if($post->user_id != \Auth::user()->id){
            session()->flash('error', 'You cannot see that post because you are not the creator!');
            return redirect()->route('posts_path');
        }
        return view('posts.edit')->with(['post' => $post]);
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->update(
                $request->only('title', 'description', 'url')
            );

        session()->flash('message', 'Post Updated!');

        return redirect()->route('post_path', ['post' => $post->id]);
    }

    public function delete(Post $post)
    {
        if($post->user_id != \Auth::user()->id){
            session()->flash('error', 'You cannot delete that post because you are not the creator!');
            return redirect()->route('posts_path');
        }

        $post->delete();

        session()->flash('message', 'Post Deleted!');

        return redirect()->route('posts_path');
    }
}
