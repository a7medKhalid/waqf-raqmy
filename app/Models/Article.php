<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function quoted(){
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'tag_article');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'commented_id')->where('commented_type', 'article');
    }
}
