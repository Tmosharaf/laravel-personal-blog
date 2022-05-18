<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // protected static function boot(){
    //     parent::boot();

    //     self::creating(function($category){
    //         $category->slug = Str::slug($category->name, '-');
    //     });
    // }

    public function post()
    {
        return $this->hasMany(Post::class, 'categories_id');
    }
}
