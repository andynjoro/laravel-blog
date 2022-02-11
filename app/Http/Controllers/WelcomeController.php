<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Cache;

use App\Services\PostService;
 
class WelcomeController extends Controller
{
    
    public function index(PostService $postService)
    {
        $posts = Cache::rememberForever('posts', function () use ($postService){
            return $postService->getPosts();
        });

        return view('welcome', ['posts' => $posts]);
    }
}