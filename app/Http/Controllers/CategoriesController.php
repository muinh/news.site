<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use App\Category;
use App\Article;
use App\User;
use App\Advertisement;
use App\Tag;

class CategoriesController extends Controller
{
    //get categories list
    public function index()
    {
        $hotArticles = Article::hotArticles(3);
        $topCommentators = User::topCommentators(5);
        $sliderArts = Article::lastPosted(3);

        $leftAds = Advertisement::getAds(1);
        $rightAds = Advertisement::getAds(0);
        $categories = Category::all();
        $tags = Tag::get();

        $coupon = function(){ return Advertisement::generateCoupon(); };

//        $settings = DB::table('styling')->get();
//        $backgroundColor = $settings->first()->background_color;
//        $headerColor = $settings->first()->header_color;
//        $layout = 'layouts.default';
//        $this->layout->content = View::make('layouts.default');
//        View::share('backgroundColor', $backgroundColor);
//        View::share('headerColor', $headerColor);

        return view('index', compact([
            'hotArticles', 'topCommentators', 'sliderArts',
            'leftAds', 'rightAds', 'coupon', 'tags', 'categories']));
    }

    //display form to create category
    public function create()
    {
        return view('categories.create');
    }

    //save category
    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request['category-title'];
        $category->alias = $request['category-alias'];
        $category->save();

        return redirect()->route('categoryCreate');
    }

    //show one direct category
    public function show(Category $category)
    {
        $paginated = $category->articles()->paginate(5);
        return view('categories.show', compact(['category', 'paginated']));
    }

    //display form to edit category info
    public function edit()
    {

    }

    //update category
    public function update(Request $request)
    {

    }

    //delete category
    public function destroy($id)
    {

    }

}
