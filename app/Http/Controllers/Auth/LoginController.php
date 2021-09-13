<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        $site = 'login';
        return view('web.main.login', compact('categories', 'site'));
    }
}
