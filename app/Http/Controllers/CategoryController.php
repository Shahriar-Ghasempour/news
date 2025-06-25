<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->where('status', 'done')->get();
        $name = $category->name;
        
        //return posts and name
    }
}
