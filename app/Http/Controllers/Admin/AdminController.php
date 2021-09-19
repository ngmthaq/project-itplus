<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function addImageForm()
    {
        return view('admin.main.add-image', [
            'site' => 'add-image'
        ]);
    }

    public function addImage(Request $request)
    {
        $images = $request->file('image');
        $fileUploadSuccessfully = [];
        foreach ($images as $index => $image) {
            $fileName = md5(Auth::user()->id . $index . $image->getClientOriginalName() . date('Y-m-d H:i:s')) . '.png';
            $image->storeAs('', $fileName, 'images');
            Media::create([
                'media_type' => 'image',
                'media_path' => 'storage/images',
                'media_name' => $fileName
            ]);
            $fileUploadSuccessfully[$index] = [
                'path' => 'storage/images',
                'name' => $fileName
            ];
        }
        return redirect(route('admin.addImageForm'))->with('image', $fileUploadSuccessfully);
    }

    public function addVideoForm()
    {
        return view('admin.main.add-video', [
            'site' => 'add-video'
        ]);
    }

    public function mediaStore()
    {
        return view('admin.main.media-store', [
            'site' => 'media-store'
        ]);
    }
}
