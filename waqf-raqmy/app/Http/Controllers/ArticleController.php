<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    public function create($author, $title, $body, $tagsNames){

        $tagsNames ?: $tagsNames = [];


        $article = Article::create([
            'title' => $title,
            'body' => $body
        ]);

        foreach ($tagsNames as $tagName){
            $tag = Tag::whereName($tagName)->firstOrcreate();

            $tag->uses =+ 1;

            $tag->save();

            $article->tags()->save($tag);
        }


        $author->articles()->save($article);

        return $article;
    }


}
