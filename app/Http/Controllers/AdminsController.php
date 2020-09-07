<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class AdminsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
        return view('admin.index', [
            'posts' => $posts
        ]);
    }
}
