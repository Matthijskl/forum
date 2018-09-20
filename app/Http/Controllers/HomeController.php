<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::firstCategory()
            ->with('subCategories')
            ->get();
        $comment = Comment::orderBy('id')->limit(8)->get();
        return view('home', compact('categories', 'comment'));
    }
}
