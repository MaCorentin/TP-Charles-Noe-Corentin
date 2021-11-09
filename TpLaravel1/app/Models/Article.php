<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected  $guarded = [];

    public function users(){
        return $this->belongsTo(user::class);
    }

    public function categoryarticles()
    {
        return $this->hasMany(CategoryArticle::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function comments(){
        return $this->hasMany(Commentaire::class);
    }
}
