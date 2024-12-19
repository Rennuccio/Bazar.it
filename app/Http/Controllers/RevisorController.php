<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        $articles_to_review = Article::whereNotNull('is_accepted')->orderBy('updated_at','desc')->take(5)->get();
        return view('revisor.index', compact('article_to_check','articles_to_review'));
    }
    
    public function accept(Article $article){
        $article->setAccepted(true);
        return redirect()
        ->back()
        ->with('message', "Hai accettato l'articolo $article->title");
    }
    
    public function reject(Article $article){
        $article->setAccepted(false);
        return redirect()
        ->back()
        ->with('message', "Hai rifiutato l'articolo $article->title");
    }
    public function becomeRevisor(){
        Mail::to('admin@bazar.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('message', 'Complimenti hai richiesto di diventare revisor');
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

    public function newRevisor(Article $article){
        $article->setAccepted(null);
        return redirect()
        ->back();
    }
}
