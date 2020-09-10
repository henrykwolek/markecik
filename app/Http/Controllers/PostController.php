<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $posts = Post::orderBy('id', 'DESC');
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

    public function userCreate()
    {
        return view('user-create-post');
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

    public function userStore()
    {
        $inputs = request()->validate([
            'title' => ['required', 'max:255'],
            'post_image' => ['file'],
            'post_price' => ['required', 'integer'],
            'body' => ['required'],
        ]);

        if(request('post_image'))
        {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        return back()->with('success', 'Zapisano ogłoszenie');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('danger', 'Usunięto ogłoszenie');
    }

    public function Userdestroy(Post $post)
    {
        $post->delete();
        return redirect()->route('user.show.profile')->with('danger', 'Twoje ogłoszenie zostało usunięte');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post'=> $post
            ]);
    }

    public function userEditPost(User $user, Post $post)
    {
        if(Auth::user()->id == $post->user->id)
        {
            return view('post-edit', [
                'post' => $post,
                'user' => $user
            ]);
        }
        else
        {
            return back();
        }
    }

    public function update(Post $post)
    {
        $inputs = request()->validate([
            'title' => ['required', 'max:255'],
            'post_image' => ['file'],
            'post_price' => ['required'],
            'status' => ['string', 'required'],
            'body' => ['required'],
        ]);

        if(request('post_image'))
        {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->post_price = $inputs['post_price'];
        $post->body = $inputs['body'];
        $post->status = $inputs['status'];

        auth()->user()->posts()->save($post);

        return back()->with('info', 'Zmiany zostały zapisane');
     }
}
