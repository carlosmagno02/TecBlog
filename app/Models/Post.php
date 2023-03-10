<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;
    protected $fillable = [
        "title",
        "img",
        "excerpt",
        "text",
    ];

    public function category(){
        return $this->belongsToMany(Category::class);
    }

    protected static function booted()
    {
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title) . Str::random(5);
        });
    }
}
