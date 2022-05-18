<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts =    Post::with('category')->paginate(6);


        return view('home.blog', compact('posts'));
    }

    public function singleBlog($id)
    {
        $post = Post::where('id', $id)->first();

        return view('home.singleBlog', compact('post'));
    }
}
