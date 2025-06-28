<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Auth;
use App\Http\Middleware\Author;
use App\Http\Middleware\Guest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Category::all();
    $uncategorized = Post::where('category_id', null)->where('status', 'accepted')->limit(4)->get();
    
    $posts = [];
    $posts['Uncategorized'] = [
        'posts' => $uncategorized,
        'id' => null
    ];

    foreach ($categories as $category) {
        $categoryPosts = $category->posts()->where('status', 'accepted')->limit(4)->get();
        if ($categoryPosts->count() > 0) {
            $posts[$category->name] = [
                'posts' => $categoryPosts,
                'id' => $category->id
            ];
        }
    }

    return view('welcome', compact('posts'));
})->name('home');

Route::get('/category', [CategoryController::class, 'showUncategorized'])->name('uncategorized.show');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');


Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');

Route::middleware([Guest::class])->prefix('/auth')->group(function() {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.show');

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware([Auth::class])->prefix('dashboard')->group(function() {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware([Author::class])->group(function() {
        Route::get('/posts')->name('dashboard.posts');

        Route::get('/posts/new')->name('dashboard.create-post');

        Route::get('/posts/{post}')->name('dashboard.edit-post');
    });
});


