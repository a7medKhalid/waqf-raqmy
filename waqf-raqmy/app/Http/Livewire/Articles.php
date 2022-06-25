<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Articles extends Component
{

    public $articles;

    public function create(){
        $article_controller = new ArticleController;

        $article = $article_controller->create(Auth::user(), 'العنوان', '', []);

        $this->redirect('/articles/edit/' . $article->id);

    }

    public function mount(){
        $this->articles = Auth::user()->articles;
    }
    public function render()
    {
        return view('livewire.articles');
    }
}
