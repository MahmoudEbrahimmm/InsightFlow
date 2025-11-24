<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        $latestPost = Post::latest()->take(3)->get();
        $latestPostTow = Post::take(1)->get();

        $categories = Category::with(['children'])->get();
        $postsByCategory = [];
        foreach ($categories as $category) {
            $postsByCategory[$category->id] = Post::where('category_id', $category->id)
                ->latest()
                ->take(4)
                ->get();
        }

        return view('index', compact([
            'posts',
            'latestPost',
            'latestPostTow',
            'categories',
            'postsByCategory',
        ]));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
