<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $featured_post = Post::where('is_featured', '=', 1)->with('category')->latest()->first();
        $posts =    Post::with('category')->paginate(4);
        $categories = Category::with('post')->latest()->get(['id','name']);


        return view('home.homePage', compact('featured_post', 'posts', 'categories'));
    }

    public function search(Request $request){
        $search = $request->search;
        $posts = Post::where('title', 'like', '%'.$search.'%')->paginate(4);
        return view('home.blog', compact('posts'));
    }


}
