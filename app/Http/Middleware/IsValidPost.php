<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsValidPost
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
        if ($request->route('post')->deleted_at) {
            return redirect('/')->with('error', 'Bài viết đã bị xoá, xin vui lòng thử lại');
        }
        return $next($request);
    }
}
