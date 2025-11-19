<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $categories = Category::latest()->paginate(3);
        $posts = Post::latest()->paginate(3);
        return view('dashboard.index',compact('categories','posts'));
    }
    
}
