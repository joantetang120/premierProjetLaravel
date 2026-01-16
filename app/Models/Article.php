<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $fillable = [
        'titre', 'contenu', 'autheur','image', 'user_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'user_id');
    }
}
