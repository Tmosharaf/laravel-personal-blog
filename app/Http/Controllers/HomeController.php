<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index()
    {
        $featured_post = Post::where('is_featured', '=', 1)->with('category')->latest()->first();
        $posts =    Post::with('category')->paginate(4);

        return view('home.homePage', compact('featured_post', 'posts'));
    }
}
