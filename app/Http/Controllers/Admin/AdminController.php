<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::with(['comments', 'userInformation'])->orderBy('id', 'desc')->get();
        $totalComments = count(Comment::all());
        $posts = Post::orderBy('created_at', 'desc')->get();
        $texts = $posts->where('type_id', '=', '1');
        $videos = $posts->where('type_id', '=', '2');
        return view('admin.main.dashboard', [
            'users' => $users,
            'posts' => $posts,
            'texts' => $texts,
            'videos' => $videos,
            'categories' => Category::withCount('posts')->get(),
            'site' => 'dashboard',
            'totalComments' => $totalComments
        ]);
    }

    public function categories()
    {
        $categories = Category::withCount('posts')->get();
        $totalComments = count(Comment::all());
        foreach ($categories as $category) {
            $category->comments = Comment::getCommentOfCategory($category);
        }
        $posts = Post::with('comments')->orderBy('created_at', 'desc')->get();
        $videos = $posts->where('type_id', '=', '2');
        return view('admin.main.categories', [
            'posts' => $posts,
            'videos' => $videos,
            'categories' => $categories,
            'site' => 'categories',
            'totalComments' => $totalComments
        ]);
    }
}
