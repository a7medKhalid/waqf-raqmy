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

    public function edit($article){
        $article_controller = new ArticleController;

        $this->redirect('/articles/edit/' . $article['id']);

    }

    public function publish($article){

        $articleModel = $this->articles->find($article['id']);
        $articleModel->isPublished = 1;
        $articleModel->save();

    }

    public function archive($article){

        $articleModel = $this->articles->find($article['id']);
        $articleModel->isPublished = 0;
        $articleModel->save();

    }

    public function delete($article ,$index){

        $article_controller = new ArticleController;

        $articleModel = $this->articles->find($article['id']);

        $article_controller->delete(Auth::user(), $articleModel);

        $this->articles->forget($index);


    }

    public function mount(){
        $this->articles = Auth::user()->articles;

    }
    public function render()
    {
        return view('livewire.articles');
    }
}
