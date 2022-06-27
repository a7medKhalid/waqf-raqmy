<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ArticleController;
use App\Models\Tag;
use Livewire\Component;

class ViewArticle extends Component
{
    public $article;

    public $isLiked = 0;

    public function like(){
        $this->isLiked = 1;
        $this->article->likes = $this->article->likes + 1;
        $this->article->save();
    }

    public function unLike(){
        $this->isLiked = 0;
        $this->article->likes = $this->article->likes - 1;
        $this->article->save();
    }

    public function mount($id){
        $article_controller = new ArticleController;

        $this->article = $article_controller->read($id);

    }



    public function render()
    {
        return view('livewire.view-article')
            ->layout('layouts.guest');
    }
}
