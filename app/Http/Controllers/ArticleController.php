<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticle;
use App\Http\Requests\UpdateArticle;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [new Middleware('auth', except: ['index','show','byCategory'])];
    }
    public function index()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->simplepaginate(20);
        return view('article.index', compact('articles'));
    }


    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::All();
        return view('article.create', compact('subcategories', 'categories'));
    }

    public function byCategory(Category $category)
    {
        $articles = Article::where('category_id' , $category->id)->paginate(15);
        return view('article.byCategory', ['articles' => $articles , 'category' => $category]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $subcategories = Subcategory::all();
        return view('article.edit', compact('article', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticle $request, Article $article) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article) {}

    public function searchArticles (Request $request){
        $searchArticles = $request->input('searchArticles');
        $articles = Article::search($searchArticles)->where('is_accepted',true)->paginate(10);

        return view ('article.searchArticle',['articles'=>$articles,'searchArticles'=>$searchArticles]);
    }
}
