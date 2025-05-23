<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Seosetting;

class PageController extends Controller
{
    public function index($slug)
    {
        $seosetting = Seosetting::first();
        // Ambil post by slug
        $page = Page::where('url', $slug)->where('status', 'published')->firstOrFail();

        return view('frontend.pages.index', compact('page', 'seosetting'));
    }
}
