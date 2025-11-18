<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryTranslation;
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


    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.show', ['item' => $category]);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $id)->get();

        return view('dashboard.categories.edit', compact('category', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->except(['image', '_token']));

        if ($request->hasFile('image')) {

            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $file = $request->file('image');
            $name = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/categories'), $name);

            $category->update([
                'image' => 'uploads/categories/' . $name,
            ]);
        }

        return redirect()->route('dashboard.categories.index')
            ->with('success', 'Updated Successfully');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }

        $category->delete();

        return redirect()->route('dashboard.categories.index')
            ->with('success', 'Deleted Successfully');
    }
}
