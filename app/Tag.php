<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    public static function findTags($request)
    {
        $tags = DB::table('tags')->where('title', $request['search'])->get();
        if(count($tags) == 0) {
            return 'no articles have this tag';
        }
        return $tags;
    }

    public static function searchForTags($request)
    {
        $term = $request->term;
        $tags = Tag::where('title', 'LIKE', '%'.$term.'%')->get();
        $searchResult = array();
        if (count($tags) == 0) {
            $searchResult[] = 'No tags found';
        } else {
            foreach ($tags as $key => $tag) {
                $searchResult[] = $tag->title;
            }
        }
    }
}
