<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class HomePage extends Component
{

    public $articles;


    public function mount(){
        $this->articles = Article::all();
    }


    public function render()
    {
        return view('livewire.home-page');
    }
}
