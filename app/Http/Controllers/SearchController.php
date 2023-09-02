<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Did some research about how Controllers work and how they are used
// Source :https://laracasts.com/discuss/channels/laravel/laravel-search-routing
// Source :https://laravel.com/docs/10.x/controllers

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $title = $request->input('title');
        $category = $request->input('Category');
        $tag = $request->input('tag');

        // Pull all articles from database
        $query = DB::table('Article')
            ->select('ARTICLE_ID', 'TITLE', 'CONTENT', 'DATE_CREATED', 'CATEGORY_ID')
            ->orderBy('DATE_CREATED', 'desc');

        // check if the entry is empty or not
        if ($title !== null && $title !== 'null') {
            $query->where('TITLE', 'like', '%'.$title.'%');
        }
        // check if the entry is empty or not
        if ($category !== null && $category !== 'null') {
            $query->where('CATEGORY_ID', '=', $category);
        }
        // check if the entry is empty or not
        if ($tag !== null && $tag !== 'null') {
            $articleIds = DB::table('ArticleTags')
                ->where('TAG_ID', '=', $tag)
                ->pluck('ARTICLE_ID');

            // Fetch articles based on the retrieved ARTICLE_ID values
            $query->whereIn('ARTICLE_ID', $articleIds);
        }

        // Execute the query
        $query = $query->get();

        // Retrieve additional data needed to get the correct tag and Category
        $categories = DB::table('Category')->get();
        $tags = DB::table('Tag')->get();
        $articleTags = DB::table('ArticleTags')->get();

        return view('search', ['query' => $query, 'categories' => $categories, 'tag' => $tags, 'articleTags' => $articleTags,
        ]);
    }
}
