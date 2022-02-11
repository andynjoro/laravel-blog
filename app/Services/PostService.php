<?php

namespace App\Services;

use Illuminate\Support\Carbon;

use App\Models\Post;
use App\Models\User;

class PostService {

    public function createUserPost(User $user, array $postData)
    {
        $post = new Post;

        $post->title = $postData['title'];
        $post->description = $postData['description'];
        $post->user_id = $user->id;
        $post->publication_date = (isset($postData['publication_date'])) ? $postData['publication_date'] : Carbon::now();

        $post->save();
    }
    
    public function getUserPosts(User $user, string $sort)
    {
        $posts = Post::where('user_id', $user->id)
                    ->orderBy('publication_date', $sort)
                    ->get();

        return $posts;
    }

    public function getPosts()
    {
        $posts = Post::orderBy('publication_date', 'desc')
                    ->get();

        return $posts;
    }
}