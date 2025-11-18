<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $post = Post::create([
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/posts'), $name);

            $post->update([
                'image' => 'uploads/posts/' . $name,
            ]);
        }

        $locales = ['en', 'ar'];
        foreach ($locales as $locale) {
            $post->translateOrNew($locale)->title = $request->input($locale . '.title');
            $post->translateOrNew($locale)->content = $request->input($locale . '.content');
            $post->translateOrNew($locale)->smallDescription = $request->input($locale . '.smallDescription');
        }
        $post->save();

        return redirect()->route('dashboard.posts.index')->with('success', 'Post Created Successfully');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('dashboard.posts.show', compact('post', 'categories'));
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->update([
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('image')) {
            if ($post->image && file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }
            $file = $request->file('image');
            $name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/posts'), $name);

            $post->update([
                'image' => 'uploads/posts/' . $name,
            ]);
        }

        $locales = ['en', 'ar'];
        foreach ($locales as $locale) {
            $post->translateOrNew($locale)->title = $request->input($locale . '.title');
            $post->translateOrNew($locale)->content = $request->input($locale . '.content');
            $post->translateOrNew($locale)->smallDescription = $request->input($locale . '.smallDescription');
        }
        $post->save();

        return redirect()->route('dashboard.posts.index')->with('success', 'Post Updated Successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image && file_exists(public_path($post->image))) {
            unlink(public_path($post->image));
        }

        $post->delete();
        return redirect()->route('dashboard.posts.index')->with('success', 'Post Deleted Successfully');
    }
}
