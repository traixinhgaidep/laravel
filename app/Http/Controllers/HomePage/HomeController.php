<?php

namespace App\Http\Controllers\HomePage;

use App\Help;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use Auth;
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
    public function index(Request $request)
    {
        $search = $request->get('search');
        $categoryId = $request->get('category_id');
        $articles = Article::getIndexHomePage($search, $categoryId);
        $articles->setPath('');
        $pagination = $articles->appends([
            'search' => $search,
            'category_id' =>$categoryId,
        ]);
        $categories = Category::all();
        return view('HomePage.home', [
            'articles' => $articles,
            'request' => $request->all(),
            'pagination'=>$pagination,
            'categories'=>$categories,
        ]);
        
    }
}
