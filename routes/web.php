<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Category::all();
    $uncategorized = Post::where('category_id', null)->where('status', 'accepted')->limit(4)->get();
    
    $posts = [];
    $posts['Uncategorized'] = $uncategorized;

    foreach ($categories as $category){
        if(count($category->posts()->where('status', 'accepted')->get()) == 0) continue;
        $posts[$category->name] = $category->posts()->where('status','accepted')->limit(4)->get();
    }

    return view('welcome',compact(['posts']));
});

Route::get('/category/{category}', [CategoryController::class, 'show']);

Route::get('/post/{post}', [PostController::class, 'show']);
