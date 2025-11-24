<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'image_path',
        'is_published',
    ];
//relation:un article appartient à un utilisateur(auteur)
    public function user(){
        return $this->belongsTo(User::class);
    }
//Utilisation du slug pour la route
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
       parent::boot();
       //Avant de créer un article, on génère le slug
         static::creating(function ($article) {
             if(empty($article->slug)){
                 $article->slug = Str::slug($article->title);
             }
         });

    }
}
