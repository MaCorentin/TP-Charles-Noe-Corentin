<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    use HasFactory;

    public function categories(){
        return $this->belongsTo(Categorie::class);
    }

    public function articles(){
        return $this->belongsTo(Article::class);
    }
}
