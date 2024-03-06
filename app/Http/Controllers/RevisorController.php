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
    public function index()
    {
        $article_to_check = Article::where('is_accepted',null)->get();
        return view('revisor.index', compact('article_to_check'));
    }
    public function acceptArticle(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti, hai accettato l\'annuncio');
    }

    public function rejectArticle(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('message', 'Complimenti, hai rifiutato l\'annuncio');
    }

    public function becomeRevisor(){
        Mail::to('info@hack63.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', 'Richiesta inviata correttamente.');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto_gruppo04_thecodefellas:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('message', 'Complimenti! L\'utente è diventato revisore');
    }

    public function show(Article $article){
        return view ('revisor.show', compact('article'));
    }
}
