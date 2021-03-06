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
        $page = Page::with('fields')
                    ->where('slug', 'home')
                    ->first();

        $page->addViewWithExpiryDate(now()->addHours(2));
                    
        $portfolios = Portfolio::with('images')
                                ->active()
                                ->published()
                                ->latest()
                                ->take(3)
                                ->get();

        $posts = Post::with('images')
                        ->active()
                        ->published()
                        ->latest()
                        ->take(4)
                        ->get();
        
        return view('pages.home', compact('page', 'portfolios', 'posts'));
    }
}
