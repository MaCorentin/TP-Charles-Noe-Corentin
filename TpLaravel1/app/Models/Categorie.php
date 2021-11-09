<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Categorie extends model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(user::class);
    }

    public function categoryarticles()
    {
        return $this->hasMany(CategoryArticle::class);
    }

}
