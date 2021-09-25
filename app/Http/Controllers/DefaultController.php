<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        // Site
        $site = 'homepage';
        // Categories
        $categories = Category::all();
        // All posts
        $posts = Post::with(['category', 'type', 'comments'])->whereNull('deleted_at')->orderBy('created_at', 'desc')->get();
        // Slider data
        $firstSliders = $posts->where('type_id', '=', '1')->take(5);
        // Video posts
        $videoPosts = $posts->where('type_id', '=', '2')->take(2);
        // Chính trị
        $firstPolitic = $posts->where('category_id', '=', '1')->take(1)->first();
        $politics = $posts->where('category_id', '=', '1')->skip(1)->take(5);
        $politicTopComments = Post::postWithComments($posts->where('category_id', '=', '1'));
        // Kinh doanh
        $firstBusiness = $posts->where('category_id', '=', '2')->take(1)->first();
        $business = $posts->where('category_id', '=', '2')->skip(1)->take(5);
        $businessTopComments = Post::postWithComments($posts->where('category_id', '=', '2'));
        // KH & CN => Science & Technology => SnT
        $firstSnT = $posts->where('category_id', '=', '3')->take(1)->first();
        $SnTs = $posts->where('category_id', '=', '3')->skip(1)->take(5);
        $SnTTopComments = Post::postWithComments($posts->where('category_id', '=', '3'));
        // SK & CĐ => Health & Community => HnC
        $firstHnC = $posts->where('category_id', '=', '4')->take(1)->first();
        $HnCs = $posts->where('category_id', '=', '4')->skip(1)->take(5);
        $HnCTopComments = Post::postWithComments($posts->where('category_id', '=', '4'));
        // Du lịch
        $firstTravel = $posts->where('category_id', '=', '5')->take(1)->first();
        $travels = $posts->where('category_id', '=', '5')->skip(1)->take(5);
        $travelTopComments = Post::postWithComments($posts->where('category_id', '=', '5'));
        // Thể thao
        $firstSport = $posts->where('category_id', '=', '6')->take(1)->first();
        $sports = $posts->where('category_id', '=', '6')->skip(1)->take(5);
        $sportTopComments = Post::postWithComments($posts->where('category_id', '=', '6'));
        return view('web.main.homepage', compact(
            'site', 'categories', 'firstSliders', 'videoPosts',
            'firstPolitic', 'politics', 'politicTopComments',
            'firstBusiness', 'business', 'businessTopComments',
            'firstSnT', 'SnTs',  'SnTTopComments',
            'firstHnC', 'HnCs',  'HnCTopComments',
            'firstTravel', 'travels', 'travelTopComments',
            'firstSport', 'sports', 'sportTopComments',
        ));
    }

    public function breakingNews()
    {
        $categories = Category::all();
        $site = 'breaking-news';
        $posts = Post::with(['category', 'comments', 'type'])
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
        return view('web.main.breaking-new', compact(
            'site', 'categories', 'posts'
        ));
    }

    public function loadmoreBreakingNews($post)
    {
        $posts = Post::with(['category', 'comments', 'type'])
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->skip($post)
            ->take(6)
            ->get();
        return view('web.parts.posts._breaking-news', compact('posts'));
    }
}
