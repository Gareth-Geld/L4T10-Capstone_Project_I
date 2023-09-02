<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Home page route - Gets all data from all tables ordered by date created
Route::get('/', function () {
    $posts = DB::table('Article')
    ->orderBy('DATE_CREATED', 'desc')
    ->get();
    $categories = DB::table('Category')->get();
    $tag = DB::table('Tag')->get();
    $articleTags = DB::table('ArticleTags')->get();

    return view('home', ['posts' => $posts, 'categories' => $categories, 'tag' => $tag, 'articleTags' => $articleTags]);
});

// Article page route - Gets all data from all tables ordered by date created it then queries where Article ID is equal to the ID from the URL
Route::get('/article/{id}', function ($ID) {
    $post = DB::table('Article')->where('ARTICLE_ID', '=', $ID)->orderBy('DATE_CREATED', 'desc')->first();
    $category = DB::table('Category')->get();
    $tag = DB::table('Tag')->get();
    $articleTags = DB::table('ArticleTags')->get();

    return view('article', ['post' => $post, 'category' => $category, 'tag' => $tag, 'articleTags' => $articleTags]);
});

// Category page route - Gets all data from all tables ordered by date created it then queries where Category = "slug" from the url
Route::get('/category/{slug}', function ($slug) {
    $posts = DB::table('Article')->orderBy('DATE_CREATED', 'desc')
    ->get();
    $categories = DB::table('Category')->where('CATEGORY', '=', $slug)->get();
    $tag = DB::table('Tag')->get();
    $articleTags = DB::table('ArticleTags')->get();

    return view('category', ['posts' => $posts, 'categories' => $categories, 'tag' => $tag, 'articleTags' => $articleTags]);
});

// Tag page route - Gets all data from all tables ordered by date created it then queries where Tag = "slug" from the url
Route::get('/tag/{slug}', function ($slug) {
    $posts = DB::table('Article')->orderBy('DATE_CREATED', 'desc')
    ->get();
    $categories = DB::table('Category')->get();
    $tag = DB::table('Tag')->where('TAG', '=', $slug)->get();
    $articleTags = DB::table('ArticleTags')->get();

    return view('tag', ['posts' => $posts, 'categories' => $categories, 'tag' => $tag, 'articleTags' => $articleTags]);
});

// Legal Route Displays legal View blade page
Route::get('/legal', function () {
    return view('legal');
});

// about us Route Displays about View blade page
Route::get('/about', function () {
    return view('about');
});

// Search route this Return the search blade page with the Category and Tag tables
Route::get('/search', function () {
    $categories = DB::table('Category')->get();
    $tag = DB::table('Tag')->get();

    return view('search', ['categories' => $categories, 'tag' => $tag]);
});

// This is the Post route received from search form on search page then executes search function found at App\Http\Controllers\SearchController@search
Route::post('search', 'App\Http\Controllers\SearchController@search')->name('search');
