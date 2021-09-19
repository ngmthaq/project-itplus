<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsVideoMp4
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
        $request->validate([
            'video' => 'required|file'
        ]);
        if ($request->file('video')->getClientOriginalExtension() != 'mp4') {
            return redirect()->back()->with('file_error', 'Vui lòng chọn file có định dạng mp4');
        }
        return $next($request);
    }
}
