<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class PostWasNotDeleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Use route model binding in middleware
        $post = $request->route('post');
        if ($post->deleted_at) {
            if ($post->type_id == 1) {
                return redirect()->route('post.manageCasualPost')->with('error', 'Bài viết đã bị xoá');
            } else {
                return redirect()->route('post.manageVideoPost')->with('error', 'Bài viết đã bị xoá');
            }
        }
        return $next($request);
    }
}
