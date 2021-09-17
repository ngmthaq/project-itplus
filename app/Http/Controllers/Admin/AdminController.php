<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::with(['comments', 'userInformation'])->orderBy('id', 'desc')->get();
        $comments = 0;
        foreach ($users as $user) {
            $comments += count($user->comments);
        }
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
            'comments' => $comments
        ]);
    }

    public function categories()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $videos = $posts->where('type_id', '=', '2');
        return view('admin.main.categories', [
            'posts' => $posts,
            'videos' => $videos,
            'categories' => Category::withCount('posts')->get(),
            'site' => 'categories',
        ]);
    }
}
