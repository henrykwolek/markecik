<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        return view('admin.posts.viewposts', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('blog-post', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        $inputs = request()->validate([
            'title' => ['required', 'max:255'],
            'post_image' => ['file'],
            'post_price' => ['required'],
            'body' => ['required'],
        ]);

        if(request('post_image'))
        {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        return redirect()->route('post.index')->with('success', 'Zapisano ogłoszenie');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('danger', 'Usunięto ogłoszenie');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post
        ]);
    }
}
