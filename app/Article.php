<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Article extends Model
{
    const PAGINATE_LIMIT = 5;
    protected $fillable = [
        'category_id',
        'title',
        'content',
        'slug',
        'user_id',
        'confirmed',
        'published',
        'reject_flag'
    ];
    /**
     * Get Artilces
     *
     * @param string|null $search
     * @param int|null $cateId
     * @param int|null $status
     * @param date|null $dateForm
     * @param date|null $dateTo
     * @param int|null $cateType
     * @return Article collection
     */
    public static function getIndex($search = null, $categoryId = null)
    {
        $query = Article::select('articles.*', 'categories.name as category', 'users.name as author')
            ->join('categories', 'articles.category_id', '=', 'categories.id')
            ->join('users','articles.user_id','=','users.id');

         if (!empty($categoryId)) {
            $query->where('articles.category_id', '=', $categoryId);
        }
        if (!empty($search)) {
            $query->where('articles.title', 'LIKE', '%'.$search.'%');
        }
        if (Auth::user()->roles[0]->slug == "editor"){
            $query->where('articles.confirmed', '=', false)
                ->where('articles.published', '=', false);
        }
        if (Auth::user()->roles[0]->slug == "secrectary"){
            $query = $query->where('articles.confirmed', '=', true)
                ->where('articles.published', '=', false)
                ->where('categories.user_id', '=', Auth::user()->id);

        }
        if (Auth::user()->roles[0]->slug == "author"){
            $query->where('articles.user_id', '=', Auth::user()->id);
        }
        $query->orderBy('articles.id', 'desc');
        return $query->paginate(self::PAGINATE_LIMIT);
    }
     public static function getIndexHomePage($search = null, $categoryId = null)
    {
        $query = Article::select('articles.*', 'categories.name')
            ->join('categories', 'articles.category_id', '=', 'categories.id');
        if (!empty($categoryId)) {
            $query->where('articles.category_id', '=', $categoryId);
        }
        if (!empty($search)) {
            $query->where('articles.title', 'LIKE', '%'.$search.'%');
        }
        $query->where('articles.published', '=', true);
        
        $query->orderBy('articles.id', 'desc');
        return $query->paginate(9);
    }
    public static function getById($id)
    {
        $article = Article::find($id);   
        return $article;
    }
}
