<?php

namespace App\Http\Livewire;

use App\Http\Controllers\CommentController;
use App\Models\Article;
use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    public $comments;

    public $commentedType;
    public $commentedId;


    public $article;
    public $comment;

    public $userName;
    public $commentBody;



    public function comment(){
        $comment_controller = new CommentController;

        if(auth()->user()){
            $newComment = $comment_controller->create(auth()->user(), null ,$this->commentedType, $this->commentedId, $this->commentBody);
        }else{

            $newComment = $comment_controller->create(null, $this->userName ,$this->commentedType, $this->commentedId, $this->commentBody);
        }

        $this->comments->push($newComment);

        $this->commentBody = '';

    }

    public function viewComments($id){
        $this->redirect('/comments/comment/' . $id);
    }

    public function back(){
        $this->redirect('/');
    }

    public function like($comment){

        $comment->likes = $comment->likes + 1;
        $comment->save();
    }

    public function unLike($comment){

        $comment->likes = $comment->likes - 1;
        $comment->save();
    }

    public function mount($type, $id){

        $comment_controller = new CommentController;
        $this->comments = $comment_controller->read($type, $id);

        if ($type === 'comment'){
            $this->comment = Comment::find($id);



        }else{
            $this->article = Article::find($id);

        }

        $this->commentedType = $type;
        $this->commentedId = $id;




    }

    public function render()
    {
        return view('livewire.comments')
            ->layout('layouts.guest');
    }
}
