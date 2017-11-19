<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Category;
use App\Tag;
use App\User;

class Article extends Model
{
    public function categories()
    {
        return $this->belongsToMany('\App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('\App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public static function findComments($id)
    {
        $article = Article::find($id);
        return $article->comments()->orderBy('rate', 'desc')->get();
    }

    public static function showVisibleComments($comments)
    {
        $visibleComments = array();
        foreach($comments as $comment) {
            if ($comment->hidden) {
                continue;
            }
            $comment->username = User::find($comment->user_id)->name;
            $visibleComments[] = $comment;
        }
        return $visibleComments;
    }

    public function findTags($article)
    {
        return $article->tags;
    }

    public static function isAnalytics($categories)
    {
        $isAnalytics = false;
        foreach($categories as $category) {
            if ($category->id === 2) {
                $isAnalytics = true;
                return $isAnalytics;
            }
        }
    }

    public static function firstSentences($article, $length)
    {
        $articleText = $article->body;
        $tmp = explode('. ',$article->body);
        $temp = array_slice($tmp, 0, $length);
        return implode('. ', $temp);
    }

    public static function getCommentsNumber()
    {
        $articles = Article::all();
        $comments = array();
        foreach ($articles as $article) {
            $comments[$article->id] = $article->comments()
                ->where('created_at', '>', date('Y-m-d H:i:s', strtotime('yesterday')))
                ->count();
        }
        arsort($comments);
        return $comments;
    }

    public static function hotArticles($quantity)
    {
        $comments = self::getCommentsNumber();
        $articles = array();
        foreach($comments as $key => $value) {
            $articles[] = Article::find($key);
        }
        $articles = array_slice($articles,0, $quantity);
        return $articles;
    }

    public static function lastPosted($quantity)
    {
        return Article::latest()->limit($quantity)->get();
    }


    public static function saveImage($request)
    {
        $filePath  = $_FILES['article-image']['tmp_name'];
        $dir = dirname(__FILE__, 4);
        $path = $dir . '/public/img/';
        $imgExt = Input::file('article-image')->getClientOriginalExtension();
        $filename = $request['article-alias'] . '.' . $imgExt;

        if (!move_uploaded_file($filePath, $path . $filename)) {
            die('Error due to saving image on the hard drive.');
        }
        return $filename;
    }

    public static function saveCategories($request, $article)
    {
        $categories = explode(',', $request['article-categories']);
        foreach($categories as $category) {
            $artCat = new ArticleCategory();
            $artCat->article_id = $article->id;
            $artCat->category_id = (int) $category;
            $artCat->save();
        }
    }

    public static function saveTags($request, $article)
    {
        $tags = explode(',', $request['article-tags']);
        foreach($tags as $tag) {
            $artTag = new ArticleTag();
            $artTag->article_id = $article->id;
            $artTag->tag_id = (int) $tag;
            $artTag->save();
        }
    }

    public static function saveArticle($request)
    {
        $filename = self::saveImage($request);

        $article = new Article();
        $article->title = $request['article-title'];
        $article->body = $request['article-body'];
        $article->image = $filename;
        $article->alias = $request['article-alias'];
        $article->save();

        return $article;
    }

    public static function filterByDate($request)
    {
        $requestResult = DB::table('articles')
            ->whereBetween('created_at', array($request['filter-date-from'],
                $request['filter-date-to']))
            ->get();
        $articles = array();
        foreach($requestResult as $art) {
            $articles[] = $art->id;
        }
        return $articles;
    }

    public static function filterByTags($request) {
        $requestResult = $request['filter-tags'];
        $articles = array();
        if ($requestResult) {
            foreach($requestResult as $tag) {
                $tmp = DB::table('article_tag')
                    ->where('tag_id', $tag)
                    ->get();
                foreach($tmp as $temp) {
                    $articles[] = $temp->article_id;
                }
            }
            $articles = array_unique($articles);
        }
        return $articles;
    }

    public static function filterByCategories($request) {
        $requestResult = $request['filter-categories'];
        $articles = array();
        if ($requestResult) {
            foreach($requestResult as $cat) {
                $tmp = DB::table('article_category')
                    ->where('category_id', $cat)
                    ->get();
                foreach($tmp as $temp) {
                    $articles[] = $temp->article_id;
                }
            }
            $articles = array_unique($articles);
        }
        return $articles;
    }


}
