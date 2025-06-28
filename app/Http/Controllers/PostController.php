<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('post', compact(['post']));
    }

    public function indexAuthor()
    {
        $user = auth()->user();

        $posts = $user->posts;

        return view('dashboard.posts', compact(['posts']));
    }

    public function create()
    {
        return view('dashboard.create-post', [
            "categories" => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            "name" => "required|max:255",
            "body" => "required",
            "category_id" => "nullable|exists:categories,id",
        ]);

        $post = $user->posts()->create($validated);

        return redirect(route('dashboard.posts'))->with('success', 'با موفقیت ساخته شد!');
    }

    public function edit(Post $post)
    {               
        $categories = Category::all();
        return view('dashboard.edit-post', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'name' => 'sometimes|max:255',
            'body' => 'sometimes',
            "category_id" => "sometimes,exists:categories,id",
        ]);

        $post->update($validated);

        return redirect(route('dashboard.posts'))->with('success', 'با موفقیت اپدیت شد!');
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect(route('dashboard.posts'))->with('success', 'با موفقیت حذف شد!');
    }
}
