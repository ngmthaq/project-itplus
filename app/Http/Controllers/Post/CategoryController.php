<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showPosts(Category $category)
    {
        $casualPosts = Post::with(['type', 'category'])
            ->where('category_id', '=', $category->id)
            ->where('type_id', '=', '1')
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        $videoPosts = Post::with(['type', 'category'])
            ->where('category_id', '=', $category->id)
            ->where('type_id', '=', '2')
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        $site = $category->id;
        $popularPosts = Post::postWithComments(Post::with('type')->where('category_id', '=', $category->id)->whereNull('deleted_at')->get());
        $categories = Category::countValidPostWithCategory();
        return view('web.main.category-posts', compact(
            'site', 'category', 'categories', 'casualPosts', 'videoPosts', 'popularPosts'
        ));
    }

    public function loadmoreCasualPosts(Category $category, $total)
    {
        $casualPosts = Post::with(['type', 'category'])
            ->where('category_id', '=', $category->id)
            ->where('type_id', '=', '1')
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->skip($total)
            ->take(6)
            ->get();
        return view('web.parts.posts._casual-post', compact('casualPosts'));
    }

    public function loadmoreVideoPosts(Category $category, $total)
    {
        $videoPosts = Post::with(['type', 'category'])
            ->where('category_id', '=', $category->id)
            ->where('type_id', '=', '2')
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->skip($total)
            ->take(6)
            ->get();
        return view('web.parts.posts._video-post', compact('videoPosts'));
    }

    public function showVideos()
    {
        $site = 'videos';
        $categories = Category::all();
        $posts = Post::with(['category', 'type'])
        ->where('type_id', '=', '2')
        ->whereNull('deleted_at')
        ->orderBy('created_at', 'desc')
        ->take(6)
        ->get();
        return view('web.main.video-posts', compact(
            'site', 'categories', 'posts'
        ));
    }

    public function loadmoreVideoPage($total)
    {
        $videoPosts = Post::with(['category', 'type'])
        ->where('type_id', '=', '2')
        ->whereNull('deleted_at')
        ->orderBy('created_at', 'desc')
        ->skip($total)
        ->take(6)
        ->get();
        return view('web.parts.posts._video-post', compact('videoPosts'));
    }
}
