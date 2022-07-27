<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function create($author = null, $name = null, $commentedType, $commentedId, $comment){

        $commentModel = Comment::create([
            'commented_type' => $commentedType,
            'commented_id' => $commentedId,
            'body' => $comment
        ]);

        if ($author){
            $author->comments()->save($commentModel);

        }else{
            $commentModel->name = $name;
            $commentModel->save();
        }

        return $commentModel;
    }

    public function read($type, $id){

        if ($type === 'comment'){
            $comments = Comment::find($id)->comments;
        }elseif ($type === 'article'){
            $comments = Article::find($id)->comments;
        }

        return $comments;
    }
}
