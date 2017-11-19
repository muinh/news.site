<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Comment;
use App\Tag;

class SiteController extends Controller
{
    public function auth()
    {
        return view('auth.signin');
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function chooseStyling()
    {
        $settings = DB::table('styling')->get();
        $headerColor = $settings->first()->header_color;
        $backgroundColor = $settings->first()->background_color;

        return view('admin.styling', compact(['headerColor', 'backgroundColor']));
    }

    public function updateStyling(Request $request)
    {
        $styling = DB::table('styling')->find(1);
        if ($styling) {
            $header = $request['styling-header'];
            $background = $request['styling-background'];

            DB::update('update styling set header_color = ?, background_color = ? where id = 1', array($header, $background));

            return redirect()->route('chooseStyling');
        }
        return '';
    }

    public function commentLike(Request $request)
    {
        $rate = Comment::addPositiveRate($request);
        echo $rate;
    }

    public function commentDislike(Request $request)
    {
        $rate = Comment::addNegativeRate($request);
        echo $rate;
    }
}
