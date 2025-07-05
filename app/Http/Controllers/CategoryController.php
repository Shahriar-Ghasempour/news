<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->where('status', 'accepted')->paginate(10);
        $name = $category->name;
        
        return view('category', compact(['posts', 'name']));
    }

    public function showUncategorized()
    {
        $posts = Post::where('category_id', null)->paginate(10);
        $name = "Uncategorized";

        return view('category', compact(['posts', 'name']));
    }
}
