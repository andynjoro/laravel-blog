<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

use App\Services\PostService;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'publication_date',
    ];

    protected static function booted()
    {
        static::created(function () {
            Cache::forget('posts');

            $postService = new PostService;
            
            $posts = $postService->getPosts();

            Cache::put('posts', $posts);
        });

    }

    public function getPublicationDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
