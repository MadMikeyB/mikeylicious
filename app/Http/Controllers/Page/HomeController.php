<?php

namespace App\Http\Controllers\Page;

use App\Models\Page;
use App\Models\Post;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $page = Page::with('fields')->where('slug', 'home')->first();
        $portfolios = Portfolio::with('images')->where('status', 'publish')->take(3)->get();
        $posts = Post::with('images')->where('status', 'publish')->take(4)->get();
        
        return view('pages.home', compact('posts', 'portfolios'));
    }
}
