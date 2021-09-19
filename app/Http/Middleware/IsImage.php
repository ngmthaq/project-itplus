<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsImage
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
            'image' => 'required'
        ]);
        $acceptableExtensions = ['png', 'jpg', 'jpeg', 'jfif'];
        $images = $request->file('image');
        foreach ($images as $index => $image) {
            $originalName = $image->getClientOriginalName();
            $originalExtension = pathinfo($originalName, PATHINFO_EXTENSION);
            if (!in_array($originalExtension, $acceptableExtensions)) {
                return redirect()->back()->with('file_error', 'Tồn tại ít nhất 1 tệp tin không đúng định dạng ảnh, vui lòng thử lại');
            }
            if ($image->getSize() > 3 * 1024 * 1024) {
                return redirect()->back()->with('file_error', 'Tồn tại ít nhất 1 tệp tin vượt quá 3 MB, vui lòng thử lại');
            }
        }
        return $next($request);
    }
}
