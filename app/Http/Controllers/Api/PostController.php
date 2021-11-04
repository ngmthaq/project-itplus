<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->query('email');
        $password = $request->query('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3) {
                $data = [];
                $data['user_id'] = Auth::user()->id;
                $data['category_id'] = $request->query('category_id');
                $data['type_id'] = 1;
                $data['cover_url'] = $request->query('cover_url');
                $data['title_vi'] = $request->query('title_vi');
                $data['subtitle_vi'] = $request->query('subtitle_vi');
                $data['content_vi'] = $request->query('content_vi');
                $post = Post::create($data);
                if ($post) {
                    Auth::logout();
                    return 'Post successfully';
                } else {
                    return 'Post failed';
                }
            } else {
                return 'Permision denied';
            }
        } else {
            return 'Authentication failed: ' . $email;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function videoStore(Request $request)
    {
        $email = $request->query('email');
        $password = $request->query('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $request->session()->regenerate();
            if (Auth::user()->role_id == 1 || Auth::user()->role_id == 3) {
                $data = [];
                $data['user_id'] = Auth::user()->id;
                $data['category_id'] = $request->query('category_id');
                $data['type_id'] = 2;
                $data['cover_url'] = $request->query('cover_url');
                $data['title_vi'] = $request->query('title_vi');
                $data['subtitle_vi'] = $request->query('subtitle_vi');
                $data['content_vi'] = $request->query('content_vi');
                $post = Post::create($data);
                if ($post) {
                    Auth::logout();
                    return 'Post video successfully';
                } else {
                    return 'Post video failed';
                }
            } else {
                return 'Permision denied';
            }
        } else {
            return 'Authentication failed: ' . $email;
        }
    }
}
