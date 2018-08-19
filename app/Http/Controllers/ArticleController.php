<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    /**
     * @return Article[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show(Article $article)
    {
        return $article;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        return Article::create($request->all());
        return response()->json($article,201);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, Article $article)
    {
//        $article = Article::findOrFail($id);
        $article->update($request->all());
//        return $article;
        return response()->json($article,200);
    }

    /**
     * @param Request $request
     * @param $id
     * @return int
     */
    public function delete(Article $article)
    {
//        $article = Article::findOrFail($id);
        $article->delete();
//        return 204;
        return response()->json(null,204);
    }
}
