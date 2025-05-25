<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Seosetting;

class GalleryController extends Controller
{
    public function index()
    {
        $seosetting = Seosetting::first();
        // Ambil semua post published
        $galleries = Gallery::paginate(6);
        
        return view('frontend.galleries.index', compact('galleries', 'seosetting'));
    }
}
