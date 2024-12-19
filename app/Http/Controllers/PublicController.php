<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PublicController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware('auth', only: ['dashboard'])];
    }

    public function homepage()
    {
        $articles = Article::all();
        $lastArticles = Article::where('is_accepted', true)->take(4)->orderBy('created_at', 'desc')->get();
        $categories = Category::all();

        return view('welcome', compact('articles', 'categories', 'lastArticles'));
    }

    public function dashboard()
    {
        return view('auth.dashboard');
    }

    public function lenguage($lang){
        session()->put('locale',$lang);
        return redirect()->back();
    }
}
