<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateArticle extends Component
{
    public $allTagsNames;

    public $article;

    public $title;
    public $body;

    public $isPublished;
    public $isSaved;

    public $tagsNames;

    public $tagNameInput;

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function trix_value_updated($value){
        $this->body = $value;
        $this->isSaved = 0;
    }




    public function publish(){
        $this->isPublished = 1;

        $this->article->isPublished = 1;
        $this->article->save();

        $this->redirect('/articles/' . $this->article->id);

    }

    public function addTag(){

        $this->resetErrorBag('tagNameInput');
        if(in_array($this->tagNameInput, $this->tagsNames->toArray())){
           $this->addError('tagNameInput', 'لايمكن إضافة التصنيف مرتين');
        }elseif (count($this->tagsNames) === 5){
            $this->addError('tagNameInput', 'لايمكن إضافة أكثر من خمس تصنيفات');
        }else{
            $this->unSave();
            $this->tagsNames->push($this->tagNameInput);
        }



    }

    public function deleteTag($index){
        $this->unSave();
        unset($this->tagsNames[$index]);
    }

    public function save(){
        $this->isSaved = 1;

        $article_controller = new ArticleController;
        $article_controller->update(Auth::user(), $this->article->id, $this->title, $this->body, $this->tagsNames);
    }

    public function unSave(){
        $this->isSaved = 0;
    }

    public function archive(){
        $this->isPublished = 0;

        $this->article->isPublished = 0;
        $this->article->save();
    }

    public function mount($id){
        $this->article = Auth::user()->articles->find($id);

        $this->title = $this->article->title;
        $this->body = $this->article->body;

        $this->tagsNames = $this->article->tags->pluck('name');
        $this->allTagsNames = Tag::all()->pluck('name');


        $this->isSaved = 1;
    }

    public function render()
    {
        return view('livewire.create-article');
    }


}
