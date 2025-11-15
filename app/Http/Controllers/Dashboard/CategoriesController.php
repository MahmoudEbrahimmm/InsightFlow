<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $category = Category::create($request->except(['image', '_token']));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/categories'), $name);

            $category->update([
                'image' => 'uploads/categories/' . $name,
            ]);
        }

        return redirect()->route('dashboard.categories.index')
            ->with('success', 'Created Successfully');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
