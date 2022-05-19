<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {


        $featured_post = Post::where('is_featured', '=', 1)->with('category')->latest()->first();
        $posts =    Post::with('category', 'comments')->paginate(4);
        $categories = Category::with('post')->latest()->get(['id','name']);
        $top_posts = Post::with('category')->withCount('comments')->paginate(3)->sortByDesc('comments_count');

        return view('home.homePage', compact('featured_post', 'posts', 'categories', 'top_posts'));
    }

    public function search(Request $request){
        $search = $request->search;
        $posts = Post::with('comments')->where('title', 'like', '%'.$search.'%')->paginate(4);
        return view('home.blog', compact('posts'));
    }


}
