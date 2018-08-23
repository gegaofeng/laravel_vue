<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use Illuminate\Http\Request;
use App\Http\Model\Article;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return new ArticleResource(Article::all());
        return Article::all();
//        return new ArticleResource(Article::all());
    }

    public function show(Article $article)
    {
//        return $article;
        ArticleResource::withoutWrapping();
        return new ArticleResource($article);
    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
