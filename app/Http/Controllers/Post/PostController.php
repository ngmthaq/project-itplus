<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCasualPostRequest;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function createCasualPostForm()
    {
        return view('admin.main.create-casual-post', [
            'site' => 'create-casual-post',
            'categories' => Category::all(),
            'images' => Media::where('media_type', '=', 'image')->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function createCasualPost(CreateCasualPostRequest $request)
    {
        $request->flash();
        // Replace kí tự đặc biệt
        $contentHandled = str_replace("'", "\'", $request->input('content_vi'));
        $titleViHandled = str_replace("'", "\'", $request->input('title_vi'));
        $subtitleViHandled = str_replace("'", "\'", $request->input('subtitle_vi'));
        // Thêm post
        $post = Post::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('category_id'),
            'type_id' => 1,
            'title_vi' => $titleViHandled,
            'subtitle_vi' => $subtitleViHandled,
            'cover_url' => $request->input('cover_url'),
            'content_vi' => $contentHandled
        ]);
        if ($post) {
            return redirect()->route('post.manageCasualPost')->with('success', 'Đăng bài viết thành công');
        }
        return redirect()->route('post.createCasualPostForm')->with('error', 'Đăng bài viết không thành công, xin vui lòng thử lại');
    }

    public function manageCasualPost()
    {
        // Lấy tất cả các post kể cả post đã bị xoá
        $posts = Post::where('type_id', '=', '1')->orderBy('id', 'desc')->get();
        // Lấy số lượng post chưa bị xoá
        $validPosts = Post::countValidPosts($posts);
        return view('admin.main.manage-casual-post', [
            'site' => 'manage-casual-post',
            'posts' => $posts,
            'validPosts' => $validPosts
        ]);
    }

    public function editCasualPostForm(Post $post)
    {
        $post->load('category');
        return view('admin.main.edit-casual-post', [
            'site' => 'edit-casual-post',
            'post' => $post,
            'categories' => Category::all(),
            'images' => Media::where('media_type', '=', 'image')->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function editCasualPost(CreateCasualPostRequest $request, Post $post)
    {
        $request->flash();
        $contentHandled = str_replace("'", "\'", $request->input('content_vi'));
        $titleViHandled = str_replace("'", "\'", $request->input('title_vi'));
        $subtitleViHandled = str_replace("'", "\'", $request->input('subtitle_vi'));
        $post->update([
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('category_id'),
            'type_id' => 1,
            'title_vi' => $titleViHandled,
            'subtitle_vi' => $subtitleViHandled,
            'cover_url' => $request->input('cover_url'),
            'content_vi' => $contentHandled
        ]);
        if ($post) {
            return redirect()->route('post.manageCasualPost')->with('success', 'Sửa bài viết thành công');
        }
        return redirect()->route('post.editCasualPostForm', ['post' => $post->id])->with('error', 'Sửa bài viết không thành công, xin vui lòng thử lại');
    }

    public function deletePost(Post $post)
    {
        $post->deleted_at = Carbon::now();
        $post->save();
        if ($post->deleted_at) {
            return view('admin.parts.deleted-post', [
                'post' => $post
            ]);
        }
        if ($post->type_id == 1) {
            return redirect(route('post.manageCasualPost'))->with('error', 'Xoá bài viết thất bại, vui lòng thử lại');
        } else {
            return redirect(route('post.manageVideoPost'))->with('error', 'Xoá bài viết thất bại, vui lòng thử lại');
        }
    }
}
