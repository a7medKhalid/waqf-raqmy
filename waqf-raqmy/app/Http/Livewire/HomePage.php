<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomePage extends Component
{

    public $articles;
    public $tags;

    public $searchQuery;
    public $tag;
    public $sortType;

    public function updatedSearchQuery(){
        $this->articles = Article::where('title', 'like', '%'.$this->searchQuery.'%')
            ->orWhere('body', 'like', '%'.$this->searchQuery.'%')
            ->get();


    }

    public function updatedTag(){
        if ($this->tag === 'all'){
            $this->articles = Article::all();
        }else{
            $this->viewCategory($this->tag);
        }
    }

    public function updatedSortType(){

        $this->articles = $this->articles->sortByDesc($this->sortType);

    }

    public function viewCategory($id){
        $this->articles = Tag::find($id)->articles;
    }


    public function mount(){

        $article_controller = new ArticleController;

        $this->articles = $article_controller->read();
        $this->tags = Tag::all();
    }

    public function render()
    {
        return view('livewire.home-page')
        ->layout('layouts.guest');
    }
}
