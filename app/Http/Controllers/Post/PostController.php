<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCasualPostRequest;
use App\Models\Category;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $contentHandled = str_replace("'", "\'", $request->input('content_vi'));
        $titleViHandled = str_replace("'", "\'", $request->input('title_vi'));
        $subtitleViHandled = str_replace("'", "\'", $request->input('subtitle_vi'));
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
        dd(Post::all());
    }
}
