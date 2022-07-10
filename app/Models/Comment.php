<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function article(){
        return $this->belongsTo(Article::class, 'commented_id');
    }

    public function comment(){
        return $this->belongsTo(Comment::class, 'commented_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'commented_id');
    }
}
