<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateArticle extends Component
{

    public $title;
    public $body;

    public $isPublished;

    public $tagsNames;




    public function render()
    {
        return view('livewire.create-article');
    }

    public function create(){
        $article_controller = new ArticleController;

        $article = $article_controller->create(Auth::user(), $this->title, $this->body, $this->tagsNames);

        $this->redirect('/articles/' . $article->id);

    }
}
