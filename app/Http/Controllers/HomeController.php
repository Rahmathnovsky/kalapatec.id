<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user'])->latest()->limit(3)->get();
        $careers = Career::all();
        return view('front-office.user.home.index', compact(['posts', 'careers']));
    }
}
