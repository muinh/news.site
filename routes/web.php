<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Categories */
Route::get('/', ['uses' => 'CategoriesController@index', 'as' => 'home',/*    'middleware' => 'auth' */]);
Route::get('/admin/categories/create', ['uses' => 'CategoriesController@create', 'as' => 'categoryCreate']);
Route::post('/admin/categories', ['uses' => 'CategoriesController@store', 'as' => 'categoryStore']);
Route::get('/categories/{category}', ['uses' => 'CategoriesController@show', 'as' => 'categories',]);


/* Articles */
Route::get('/admin/articles/create', ['uses' => 'ArticlesController@create', 'as' => 'articleCreate']);
Route::post('/admin/articles', ['uses' => 'ArticlesController@store', 'as' => 'articleStore']);
Route::get('/articles/{article}', 'ArticlesController@show');
Route::post('/articles/filter', ['uses' => 'ArticlesController@filter', 'as' => 'articleFilter']);


/* Styling */
Route::get('/admin/styling', ['uses' => 'SiteController@chooseStyling', 'as' => 'chooseStyling']);
Route::put('/admin/styling', ['uses' => 'SiteController@updateStyling', 'as' => 'updateStyling']);


/* Advertisements */
Route::get('/admin/advertisements/create', ['uses' => 'AdminController@advertisements', 'as' => 'createAd']);
Route::post('/admin/advertisements', ['uses' => 'AdminController@saveAd', 'as' => 'saveAd']);


/* Menus */
Route::get('/admin/menu', ['uses' => 'MenuController@index', 'as' => 'menuIndex']);
Route::get('/admin/menu/create', ['uses' => 'MenuController@create', 'as' => 'menuCreate']);
Route::post('/admin/menu', ['uses' => 'MenuController@store', 'as' => 'menuStore']);
Route::get('/admin/menu/{menu}/edit', ['uses' => 'MenuController@edit', 'as' => 'menuEdit']);
Route::put('/admin/menu/', ['uses' => 'MenuController@update', 'as' => 'menuUpdate']);


/* Comments */
Route::get('/admin/comments', ['uses' => 'CommentsController@index', 'as' => 'commentIndex']);
Route::get('/admin/comments/create', ['uses' => 'CommentsController@create', 'as' => 'commentCreate']);
Route::post('/admin/comments/store', ['uses' => 'CommentsController@store', 'as' => 'commentStore']);
Route::get('/admin/comments/{comment}/edit', ['uses' => 'CommentsController@edit', 'as' => 'commentEdit']);
Route::put('/admin/comments/', ['uses' => 'CommentsController@update', 'as' => 'commentUpdate']);
Route::get('/admin/comments/moderate', ['uses' => 'CommentsController@moderate', 'as' => 'commentModerate']);
Route::post('/comments/like', ['uses' => 'SiteController@commentLike', 'as' => 'commentLike']);
Route::post('/comments/dislike', ['uses' => 'SiteController@commentDislike', 'as' => 'commentDislike']);

/* Tags */
Route::get('/tags/{tag}', 'TagsController@show');
Route::post('/tags/search', ['uses' => 'TagsController@search', 'as' => 'tagSearch']);
Route::get('/search', ['uses' => 'TagsController@autocomplete', 'as' => 'autocomplete']);


/* Users */
Route::get('/users/{user}/comments', ['uses' => 'UserController@showComments', 'as' => 'userComments']);


Auth::routes();

Route::get('/admin', ['uses' => 'SiteController@admin', 'as' => 'admin']);
