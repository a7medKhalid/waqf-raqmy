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

    public function update($author, $id, $title, $body, $newTagsNames){

        $newTagsNames ?: $newTagsNames = [];


        $article = $author->articles->find($id);

        $article->title = $title;
        $article->body = $body;

        $oldTags = $article->tags;
        $currentTagsNames = $oldTags->pluck('name');

        //delete tags
        foreach ($oldTags as $oldTag){
            if (!in_array($oldTag->name, $newTagsNames->toArray())){
                $article->tags()->detach($oldTag->id);
            }

        }

        //add new tags
        foreach ($newTagsNames as $tagName){
            $tag = Tag::whereName($tagName)->firstOrcreate(['name' => $tagName]);

            if (!in_array($tagName, $currentTagsNames->toArray())){
                $tag->uses = $tag->uses + 1;

                $tag->save();

                $article->tags()->save($tag);
            }

        }

        $article->save();

        return $article;
    }

    public function delete($author, $article){
        $articleModel = $author->articles->find($article->id);

        $articleModel->delete();
    }

    public function read($id = null){
        if ($id){
            $response = Article::whereId($id)->where('isPublished', 1)->first();
            $response->views = $response->views + 1;
            $response->save();
        }else{
            $response = Article::where('isPublished', 1)->get();
        }

        return $response;
    }


}
