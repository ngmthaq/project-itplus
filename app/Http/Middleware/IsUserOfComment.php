<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsUserOfComment
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
        if ($request->route('comment')->user->id == Auth::user()->id || Auth::user()->role_id == 1) {
            return $next($request);
        }
        return redirect()->back()->with('Không thể thực hiện hành động');
    }
}
