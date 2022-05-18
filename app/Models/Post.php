<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'categories_id',
        'thumbnail',
        'is_featured',
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
