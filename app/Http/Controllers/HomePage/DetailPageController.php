<?php

namespace App\Http\Controllers\HomePage;

use App\Help;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use Auth;
class DetailPageController extends Controller
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
    public function index(Request $request)
    {
        $id = $request->get('id');
        $article = Article::getById($id);
        $categories = Category::all();      
        
        return view('HomePage.detailpage', [
            'article' => $article,
            'request' => $request->all(),
            'categories'=>$categories,
        ]);
        
    }
}
