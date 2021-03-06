<?php

namespace App\Http\Controllers\Page;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display the given page.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        $page->addViewWithExpiryDate(now()->addHours(2));
        return view('pages.show', compact('page'));
    }
}
