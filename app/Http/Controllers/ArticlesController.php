<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Article;
use App\ArticleTag;
use App\ArticleCategory;

class ArticlesController extends Controller
{
    //get articles list
    public function index()
    {
        $articles = Article::all();
        return view('index', compact('articles'));
    }

    //display form to create article
    public function create()
    {
        return view('articles.create');
    }

    //save article
    public function store(Request $request)
    {
        $article = Article::saveArticle($request);
        Article::saveCategories($request, $article);
        Article::saveTags($request, $article);

        return redirect()->route('articleCreate');
    }

    //show one direct article
    public function show(Article $article)
    {
        $firstFiveSentences = Article::firstSentences($article, 5);
        $isAnalytics = Article::isAnalytics($article->categories);
        $visibleComments = Article::showVisibleComments($article->comments);

        return view('articles.show', compact([
            'article', 'visibleComments', 'isAnalytics', 'firstFiveSentences'
        ]));
    }

    //display form to edit article info
    public function edit()
    {

    }

    //update article
    public function update(Request $request)
    {

    }

    //delete article
    public function destroy($id)
    {

    }

    public function filter(Request $request)
    {
        $filterByDate = Article::filterByDate($request);
        $filterByTags = Article::filterByTags($request);
        $filterByCategories = Article::filterByCategories($request);

        $resultIds = array_unique(array_merge($filterByDate, $filterByTags, $filterByCategories));
        $articles = Article::find($resultIds);
        return view('articles.filter', compact('articles'));
    }
}