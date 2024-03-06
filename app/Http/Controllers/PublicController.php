<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home(){
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        $categories = Category::all();
        
        return view('welcome', compact('articles', 'categories'));
    }

    public function dashboard()
    {
        $articles = Auth::user()->articles()->orderBy('created_at', 'desc')->get();
        return view('auth.dashboard', compact('articles'));
    }

    public function searchArticles(Request $request){
        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(8);
        return view('articles.index', compact('articles'));
    }

    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }

    public function aboutus(){
        return view('about-us');
    }
}
