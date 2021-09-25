<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Lấy số người dùng hiện tại
        $users = User::with(['comments', 'userInformation'])->orderBy('id', 'desc')->get();
        // Lấy số comments hiện tại
        $totalComments = count(Comment::all());
        // Lấy tất cả bài viết chưa bị xoá
        $posts = Post::whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        // Lấy những bài viết cơ bản
        $texts = $posts->where('type_id', '=', '1');
        // Lấy những bài viết dạng video
        $videos = $posts->where('type_id', '=', '2');
        // Lấy danh sách danh mục
        $categories = Category::with('posts')->get();
        // Đếm số bài viết chưa bị xoá ở mỗi danh mục
        foreach ($categories as $category) {
            $category->comments = Comment::getCommentOfCategory($category);
            $validPosts = Post::countValidPosts($category->posts);
            $category->valid_posts = $validPosts;
        }
        return view('admin.main.dashboard', [
            'users' => $users,
            'posts' => $posts,
            'texts' => $texts,
            'videos' => $videos,
            'categories' => $categories,
            'site' => 'dashboard',
            'totalComments' => $totalComments
        ]);
    }

    public function categories()
    {
        // Lấy comments
        $totalComments = count(Comment::all());
        // Lấy danh mục
        $categories = Category::with('posts')->get();
        // Đếm số bài viết còn lại mỗi danh mục
        foreach ($categories as $category) {
            $category->comments = Comment::getCommentOfCategory($category);
            $validPosts = Post::countValidPosts($category->posts);
            $category->valid_posts = $validPosts;
        }
        // Lấy tất cả bài viết chưa bị xoá
        $posts = Post::with('comments')->whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        // Lấy bài viết dạng video
        $videos = $posts->where('type_id', '=', '2');
        // Số bài viết mới trong tháng
        $monthlyPosts = Post::where('created_at', 'like', '%' . date('Y-m') . '%')->get();
        return view('admin.main.categories', [
            'posts' => $posts,
            'videos' => $videos,
            'categories' => $categories,
            'site' => 'categories',
            'totalComments' => $totalComments,
            'monthlyPosts' => $monthlyPosts
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

    public function addVideo(Request $request)
    {
        $fileUploadSuccessfully = [];
        $video = $request->file('video');
        $videoName = md5(Auth::user()->id . $video->getClientOriginalName() . date('Y-m-d H:i:s')) . '.mp4';
        $video->storeAs('', $videoName, 'videos');
        Media::create([
            'media_type' => 'video',
            'media_path' => 'storage/videos',
            'media_name' => $videoName
        ]);
        $fileUploadSuccessfully = [
            'path' => 'storage/videos',
            'name' => $videoName
        ];
        return redirect(route('admin.addVideoForm'))->with('video', $fileUploadSuccessfully);
    }

    public function mediaStore()
    {
        $media = Media::all();
        $images = $media->where('media_type', '=', 'image');
        $videos = $media->where('media_type', '=', 'video');
        return view('admin.main.media-store', [
            'site' => 'media-store',
            'images' => $images,
            'videos' => $videos
        ]);
    }

    public function userManagerForm()
    {
        $users = User::with(['role', 'userInformation'])->get();
        $admins = $users->where('role_id', '=', '1');
        $readers = $users->where('role_id', '=', '2');
        $mods = $users->where('role_id', '=', '3');
        return view('admin.main.manage-user', [
            'site' => 'manage-user',
            'admins' => $admins,
            'readers' => $readers,
            'mods' => $mods
        ]);
    }

    public function grandAdmin(User $user)
    {
        $user->role_id = 1;
        $user->save();
        $users = User::with(['role', 'userInformation'])
            ->where('role_id', '=', '1')
            ->get();
        // dd($users);
        return view('admin.parts._user-role', compact('users'));
    }

    public function grandReader(User $user)
    {
        $user->role_id = 2;
        $user->save();
        $users = User::with(['role', 'userInformation'])
            ->where('role_id', '=', '2')
            ->get();
        // dd($users);
        return view('admin.parts._user-role', compact('users'));
    }

    public function grandMod(User $user)
    {
        $user->role_id = 3;
        $user->save();
        $users = User::with(['role', 'userInformation'])
            ->where('role_id', '=', '3')
            ->get();
        // dd($users);
        return view('admin.parts._user-role', compact('users'));
    }

    public function deleteUser(User $user)
    {
        $user->deleted_at = Carbon::now();
        $user->save();
        return view('admin.parts._deleted-user', compact('user'));
    }

    public function showUser(User $user)
    {
        $user->load(['userInformation', 'comments', 'posts']);
        return view('admin.main.show-user', [
            'site' => 'manage-user',
            'user' => $user
        ]);
    }
}
