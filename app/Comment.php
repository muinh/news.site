<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    public function Article()
    {
        return $this->belongsTo('Article');
    }

    public static function getAll()
    {
        $comments = DB::table('comments')->get();
        return $comments;
    }

    public static function getForModeration()
    {
        $toModerate = DB::table('comments')->where('hidden', 1)->get();
        return $toModerate;
    }

    public static function handleCategoriesInput($request)
    {
        $categories = explode(' ', $request['article-category']);
        $categories = array_diff($categories, array(''));
    }

    public static function saveComment($request, $categories)
    {
        $comment = new Comment();
        $comment->article_id = $request['comment-post'];
        $comment->user_id = $request['comment-user'];
        $comment->parent_id = $request['comment-parent'];
        $comment->content = $request['comment-content'];
        $comment->rate = $request['comment-rate'];
        foreach ($categories as $category) {
            $category == 1 ? $comment->hidden = 1 : '';
        }
        $comment->save();
    }

    public static function updateComment($request)
    {
        $comment = Comment::findOrFail($request['comments-edit-id']);
        $comment->article_id = $request['comments-edit-post-id'];
        $comment->user_id = $request['comments-edit-user-id'];
        $comment->parent_id = $request['comments-edit-parent-id'];
        $comment->content = $request['comments-edit-content'];
        $comment->rate = $request['comments-edit-rate'];
        $comment->hidden = $request['comments-edit-hidden'] ? 1 : 0;
        $comment->save();
    }

    public static function addPositiveRate($request)
    {
        $id = $request->input('id');
        $rate = DB::table('comments')->where('id', $id)->value('rate');
        DB::update('update comments set rate = ? where id = ?', array(++$rate, $id));
        return $rate;
    }

    public static function addNegativeRate($request)
    {
        $id = $request->input('id');
        $rate = DB::table('comments')->where('id', $id)->value('rate');
        DB::update('update comments set rate = ? where id = ?', array(--$rate, $id));
        return $rate;
    }

//    public static function func1()
//    {
//        $mBuilder = Menu::make('MyComments', function($m) use ($comments) {
//            foreach($comments as $c) {
//                if($c->parent_id == 0) {
//                    $m->add($c->content, $c->user_id, $c->id)->id($c->id);
//                } else {
//                    if($m->find($c->parent_id)) {
//                        $m->find($c->parent_id)->add($c->content, $c->user_id, $c->id)->id($c->id);
//                    }
//                }
//            }
//        });
//        return $mBuilder;
//    }
}
